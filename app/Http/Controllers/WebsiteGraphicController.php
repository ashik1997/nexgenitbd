<?php

namespace App\Http\Controllers;

use App\Models\WebsiteGraphic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class WebsiteGraphicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websiteGraphics = WebsiteGraphic::orderBy('id', 'desc')->get();
        return view('backend.website.graphics.index', compact('websiteGraphics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.website.graphics.create');
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
            'image'   => 'required|image',
        ]);
        $websiteGraphic = new WebsiteGraphic();

        if($request->hasFile('image')){
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/website/graphics/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $websiteGraphic->image   = $folder_path . $image_new_name;
        }

        try {
            $websiteGraphic->save();
            return redirect()->route('websiteGraphic.index')->withToastSuccess('Successfully Saved');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebsiteGraphic  $websiteGraphic
     * @return \Illuminate\Http\Response
     */
    public function show(WebsiteGraphic $websiteGraphic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebsiteGraphic  $websiteGraphic
     * @return \Illuminate\Http\Response
     */
    public function edit(WebsiteGraphic $websiteGraphic)
    {
        return view('backend.website.graphics.edit', compact('websiteGraphic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebsiteGraphic  $websiteGraphic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebsiteGraphic $websiteGraphic)
    {
        $request->validate([
            'image'   => 'nullable|image',
        ]);
        $websiteGraphic = $websiteGraphic;

        if($request->hasFile('image')){
            if ($websiteGraphic->image != null)
                File::delete(public_path($websiteGraphic->image)); //Old image delete
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/website/graphics/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $websiteGraphic->image   = $folder_path . $image_new_name;
        }

        try {
            $websiteGraphic->save();
            return redirect()->route('websiteGraphic.index')->withToastSuccess('Successfully Updated');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebsiteGraphic  $websiteGraphic
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteGraphic $websiteGraphic)
    {
        try {
            if ($websiteGraphic->image != null)
                File::delete(public_path($websiteGraphic->image)); //Old image delete
            $websiteGraphic->delete();
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
