<?php

namespace App\Http\Controllers;

use App\Models\WebsiteBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class WebsiteBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websiteBanners = WebsiteBanner::orderBy('id', 'desc')->get();
        return view('backend.website.banner.index', compact('websiteBanners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.website.banner.create');
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
            'title' => 'required|string',
            'description' => 'required|string',
            'short_description' => 'required|string',
            'view_btn_url'   => 'nullable|string',
            'purchase_btn_url'   => 'nullable|string',
            'image' => 'required|image',
            'short_image' => 'required|image',

        ]);
        $banner = new WebsiteBanner();
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->short_description = $request->description;
        $banner->view_btn_url = $request->view_btn_url;
        $banner->purchase_btn_url = $request->purchase_btn_url;

        if($request->hasFile('image')){
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/website/banner/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $banner->image   = $folder_path . $image_new_name;
        }
        if($request->hasFile('short_image')){
            $image             = $request->file('short_image');
            $folder_path       = 'uploads/images/website/banner/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $banner->short_image   = $folder_path . $image_new_name;
        }
        try {
            $banner->save();
            return redirect()->route('websiteBanner.index')->withToastSuccess('Successfully Saved');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebsiteBanner  $websiteBanner
     * @return \Illuminate\Http\Response
     */
    public function show(WebsiteBanner $websiteBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebsiteBanner  $websiteBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(WebsiteBanner $websiteBanner)
    {
        return view('backend.website.banner.edit', compact('websiteBanner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebsiteBanner  $websiteBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebsiteBanner $websiteBanner)
    {
        $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'view_btn_url'   => 'nullable|string',
            'purchase_btn_url'   => 'nullable|string',
            'image' => 'nullable|image',
            'short_image' => 'nullable|image',
        ]);
        $banner =  $websiteBanner;
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->short_description = $request->description;
        $banner->view_btn_url = $request->view_btn_url;
        $banner->purchase_btn_url = $request->purchase_btn_url;

        if($request->hasFile('image')){
            if ($websiteBanner->image != null)
                File::delete(public_path($websiteBanner->image)); //Old image delete
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/website/banner/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $banner->image   = $folder_path . $image_new_name;
        }
        if($request->hasFile('short_image')){
            if ($websiteBanner->image != null)
                File::delete(public_path($websiteBanner->short_image)); //Old image delete
            $image             = $request->file('short_image');
            $folder_path       = 'uploads/images/website/banner/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $banner->short_image   = $folder_path . $image_new_name;
        }
        try {
            $banner->save();
            return redirect()->route('websiteBanner.index')->withToastSuccess('Successfully Saved');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebsiteBanner  $websiteBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteBanner $websiteBanner)
    {
        try {
            if ($websiteBanner->image != null)
                File::delete(public_path($websiteBanner->image)); //Old image delete
            if ($websiteBanner->short_image != null)
                File::delete(public_path($websiteBanner->short_image)); //Old image delete
            $websiteBanner->delete();
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
