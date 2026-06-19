<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $data = Testimonial::orderBy('id', 'desc')->get();
            return datatables::of($data)
                ->addColumn('writer_avatar', function($data) {
                    return '<img height="70px;" src="'.asset($data->writer_avatar ?? get_static_option('no_image')).'" width="70px;" class="rounded-circle" />';
                })->addColumn('action', function($data) {
                    return '<a href="'.route('testimonial.edit', $data).'" class="btn btn-info"><i class="fa fa-edit"></i> </a>
                    <button class="btn btn-danger" onclick="delete_function(this)" value="'.route('testimonial.destroy', $data).'"><i class="fa fa-trash"></i> </button>';
                })
                ->rawColumns(['writer_avatar','action'])
                ->make(true);
        }else{
            return view('backend.testimonial.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.testimonial.create');
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
            'writer_name' => 'required|string',
            'writer_designation' => 'required|string',
            'speech' => 'required|string',
            'image' => 'nullable|image',
        ]);
        $testimonial = new Testimonial();
        $testimonial->writer_name    =   $request->writer_name;
        $testimonial->writer_designation    =  $request->writer_designation;
        $testimonial->speech    =  $request->speech;

        if($request->hasFile('image')){
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/testimonial/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $testimonial->writer_avatar   = $folder_path . $image_new_name;
        }
        try {
            $testimonial->save();
            return back()->withToastSuccess('Successfully saved.');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('backend.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {

        $request->validate([
            'writer_name' => 'required|string',
            'writer_designation' => 'required|string',
            'speech' => 'required|string',
            'image' => 'nullable|image',
        ]);

        $testimonial->writer_name    =   $request->writer_name;
        $testimonial->writer_designation    =  $request->writer_designation;
        $testimonial->speech    =  $request->speech;

        if($request->hasFile('image')){
            if ($testimonial->writer_avatar != null)
                File::delete(public_path($testimonial->writer_avatar)); //Old image delete
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/testimonial/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $testimonial->writer_avatar   = $folder_path . $image_new_name;
        }
        try {
            $testimonial->save();
            return back()->withToastSuccess('Successfully saved.');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        try {
            if ($testimonial->writer_avatar != null)
                File::delete(public_path($testimonial->writer_avatar)); //Old image delete
            $testimonial->delete();
            return response()->json([
                'type' => 'success',
            ]);
        }catch (\Exception$exception){
            return response()->json([
                'type' => 'error',
            ]);
        }
    }
}
