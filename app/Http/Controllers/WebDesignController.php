<?php

namespace App\Http\Controllers;

use App\Models\WebDesign;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class WebDesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webDesigns = WebDesign::orderBy('id', 'desc')->get();
        return view('backend.web-design.index', compact('webDesigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.web-design.create');
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
            'title' => 'required|min:3|string|unique:web_designs,title',
            'image' => 'required|image',
            'description'   => 'required|string',
        ]);

        $webDesign = new WebDesign();
        $webDesign->title = $request->title;
        $webDesign->description = $request->description;

        if($request->hasFile('image')){
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/web-design/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $webDesign->image   = $folder_path . $image_new_name;
        }

        try {
            $webDesign->save();
            return redirect()->route('webDesign.index')->withToastSuccess('Successfully Saved');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebDesign  $webDesign
     * @return \Illuminate\Http\Response
     */
    public function show(WebDesign $webDesign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebDesign  $webDesign
     * @return \Illuminate\Http\Response
     */
    public function edit(WebDesign $webDesign)
    {
        return view('backend.web-design.edit', compact('webDesign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebDesign  $webDesign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebDesign $webDesign)
    {
        $request->validate([
            'title' => 'required|min:3|string|unique:web_designs,title,'.$webDesign->id,
            'image' => 'nullable|image',
            'description'   => 'required|string',
        ]);

        $webDesign->title = $request->title;
        $webDesign->description = $request->description;

        if($request->hasFile('image')){
            if ($webDesign->image != null)
            File::delete(public_path($webDesign->image)); //Old image delete
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/web-design/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $webDesign->image   = $folder_path . $image_new_name;
        }

        try {
            $webDesign->save();
            return redirect()->route('webDesign.index')->withToastSuccess('Successfully Updated');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebDesign  $webDesign
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebDesign $webDesign)
    {
        try {
            if ($webDesign->image != null)
             File::delete(public_path($webDesign->image)); //Old image delete
            $webDesign->delete();
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
