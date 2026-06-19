<?php

namespace App\Http\Controllers;

use App\Models\WebsiteClient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class WebsiteClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websiteClients = WebsiteClient::orderBy('sort_order')->orderByDesc('id')->get();
        return view('backend.website.client.index', compact('websiteClients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.website.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'industry' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
            'url' => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'image' => 'required|image|max:2048',
        ]);
        $websiteClient = new WebsiteClient();
        $this->fillClient($websiteClient, $request);

        if($request->hasFile('image')){
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/website/client/';
            File::ensureDirectoryExists(base_path($folder_path));
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            Image::make($image->getRealPath())->resize(500, 260, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save(base_path($folder_path.$image_new_name), 88);
            $websiteClient->image   = $folder_path . $image_new_name;
        }

        try {
            $websiteClient->save();
            return redirect()->route('websiteClient.index')->withToastSuccess('Successfully Saved');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebsiteClient  $websiteClient
     * @return \Illuminate\Http\Response
     */
    public function show(WebsiteClient $websiteClient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebsiteClient  $websiteClient
     * @return \Illuminate\Http\Response
     */
    public function edit(WebsiteClient $websiteClient)
    {
        return view('backend.website.client.edit', compact('websiteClient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebsiteClient  $websiteClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebsiteClient $websiteClient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'industry' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
            'url' => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'image' => 'nullable|image|max:2048',
        ]);
        $this->fillClient($websiteClient, $request);

        if($request->hasFile('image')){
            $this->deleteUploadedLogo($websiteClient->image);
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/website/client/';
            File::ensureDirectoryExists(base_path($folder_path));
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            Image::make($image->getRealPath())->resize(500, 260, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save(base_path($folder_path.$image_new_name), 88);
            $websiteClient->image   = $folder_path . $image_new_name;
        }

        try {
            $websiteClient->save();
            return redirect()->route('websiteClient.index')->withToastSuccess('Successfully Updated');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebsiteClient  $websiteClient
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteClient $websiteClient)
    {
        try {
            $this->deleteUploadedLogo($websiteClient->image);
            $websiteClient->delete();
            return response()->json([
                'type' => 'success',
            ]);
        }catch (\Exception$exception){
            return response()->json([
                'type' => 'error',
            ]);
        }
    }

    private function fillClient(WebsiteClient $websiteClient, Request $request)
    {
        $websiteClient->name = $request->name;
        $websiteClient->industry = $request->industry;
        $websiteClient->description = $request->description;
        $websiteClient->url = $request->url ?: '#';
        $websiteClient->sort_order = $request->input('sort_order', 0);
        $websiteClient->is_active = $request->boolean('is_active');
    }

    private function deleteUploadedLogo($path)
    {
        if ($path && Str::startsWith($path, 'uploads/images/website/client/')) {
            File::delete(base_path($path));
        }
    }
}
