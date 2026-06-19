<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class MediaManagerController extends Controller
{
    private const ALLOWED_EXTENSIONS = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

    public function index()
    {
        return view('backend.media.index');
    }

    public function library(Request $request)
    {
        $search = Str::lower(trim((string) $request->query('search')));
        $page = max(1, (int) $request->query('page', 1));
        $perPage = min(60, max(12, (int) $request->query('per_page', 30)));

        $files = collect($this->mediaRoots())
            ->flatMap(function ($root) {
                if (! File::isDirectory($root['absolute'])) {
                    return [];
                }

                return collect(File::allFiles($root['absolute']))
                    ->filter(function ($file) {
                        return in_array(Str::lower($file->getExtension()), self::ALLOWED_EXTENSIONS, true);
                    })
                    ->map(function ($file) use ($root) {
                        $relative = str_replace('\\', '/', $root['relative'].'/'.$file->getRelativePathname());
                        $dimensions = $this->dimensions($file->getPathname());

                        return [
                            'name' => $file->getFilename(),
                            'path' => $relative,
                            'url' => asset($relative),
                            'size' => $file->getSize(),
                            'width' => $dimensions[0] ?? null,
                            'height' => $dimensions[1] ?? null,
                            'modified_at' => date(DATE_ATOM, $file->getMTime()),
                            'deletable' => Str::startsWith($relative, 'uploads/media/'),
                        ];
                    });
            })
            ->when($search, function ($files) use ($search) {
                return $files->filter(function ($file) use ($search) {
                    return Str::contains(Str::lower($file['name'].' '.$file['path']), $search);
                });
            })
            ->sortByDesc('modified_at')
            ->values();

        return response()->json([
            'data' => $files->forPage($page, $perPage)->values(),
            'meta' => [
                'current_page' => $page,
                'last_page' => max(1, (int) ceil($files->count() / $perPage)),
                'per_page' => $perPage,
                'total' => $files->count(),
            ],
        ]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'files' => 'required',
            'files.*' => 'image|max:5120',
        ]);

        $directory = 'uploads/media/'.date('Y/m').'/';
        File::ensureDirectoryExists(base_path($directory));
        $uploaded = [];

        foreach ($request->file('files', []) as $file) {
            $extension = Str::lower($file->getClientOriginalExtension() ?: 'jpg');
            $baseName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $fileName = ($baseName ?: 'image').'-'.Str::lower(Str::random(8)).'.'.$extension;
            $path = $directory.$fileName;

            if ($extension === 'gif') {
                $file->move(base_path($directory), $fileName);
            } else {
                Image::make($file->getRealPath())
                    ->resize(2400, 2400, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->save(base_path($path), 90);
            }

            $uploaded[] = [
                'name' => $fileName,
                'path' => $path,
                'url' => asset($path),
            ];
        }

        return response()->json([
            'message' => count($uploaded).' image(s) uploaded successfully.',
            'data' => $uploaded,
        ], 201);
    }

    public function destroy(Request $request)
    {
        $request->validate(['path' => 'required|string']);
        $relative = str_replace('\\', '/', ltrim($request->path, '/'));

        abort_unless(Str::startsWith($relative, 'uploads/media/'), 403, 'Only Media Library uploads can be deleted.');

        $absolute = realpath(base_path($relative));
        $mediaRoot = realpath(base_path('uploads/media'));

        abort_unless($absolute && $mediaRoot && Str::startsWith($absolute, $mediaRoot), 404);

        File::delete($absolute);

        return response()->json(['message' => 'Image deleted successfully.']);
    }

    private function mediaRoots()
    {
        return [
            ['absolute' => base_path('uploads/images'), 'relative' => 'uploads/images'],
            ['absolute' => base_path('uploads/media'), 'relative' => 'uploads/media'],
            ['absolute' => base_path('assets/frontend/img'), 'relative' => 'assets/frontend/img'],
        ];
    }

    private function dimensions($path)
    {
        $size = @getimagesize($path);

        return $size ? [$size[0], $size[1]] : [null, null];
    }
}
