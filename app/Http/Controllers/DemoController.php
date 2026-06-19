<?php

namespace App\Http\Controllers;

use App\Models\Demo;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class DemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $data = Demo::orderBy('id', 'desc')->get();
            return datatables::of($data)
                ->addColumn('writer', function($data) {
                    if($data->writer)
                        return '<span class="badge badge-pill badge-success">'.$data->writer->name.'</span>';
                })->addColumn('status', function($data) {
                    if($data->is_active == true){
                        return '<span class="badge badge-pill badge-primary">Active</span>';
                    }else{
                        return '<span class="badge badge-pill badge-danger">Inactive</span>';
                    }
                })->addColumn('image', function($data) {
                    return '<img height="70px;" src="'.asset($data->image ?? get_static_option('no_image')).'" width="70px;" class="rounded-circle" />';
                })->addColumn('action', function($data) {
                    return '<a href="'.route('demo.edit', $data).'" class="btn btn-info"><i class="fa fa-edit"></i> </a>
                    <button class="btn btn-danger" onclick="delete_function(this)" value="'.route('demo.destroy', $data).'"><i class="fa fa-trash"></i> </button>';
                })
                ->rawColumns(['writer','status','image','action'])
                ->make(true);
        }else{
            return view('backend.demo.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.demo.create');
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
            'status' => 'required',
            'image' => 'nullable|image',
        ]);
        $demo = new Demo();

        $demo->title    =   $request->title;
        $demo->url    =   $request->url;
        $demo->price    =   $request->price;
        $demo->is_active    =  $request->status;
        $demo->description    =  $request->description;
        $demo->slug    =  time().'-'.Str::random(12);
        $demo->writer_id    =  1;

        if($request->hasFile('image')){
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/demo/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $demo->image   = $folder_path . $image_new_name;
        }
        try {
            $demo->save();
            return back()->withToastSuccess('Successfully saved.');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demo $demo
     * @return \Illuminate\Http\Response
     */
    public function show(Demo $demo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demo $demo
     * @return \Illuminate\Http\Response
     */
    public function edit(Demo $demo)
    {
        return view('backend.demo.edit', compact('demo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demo $demo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demo $demo)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required',
            'image' => 'nullable|image',
        ]);

        $demo->title    =   $request->title;
        $demo->url    =   $request->url;
        $demo->price    =   $request->price;
        $demo->is_active    =  $request->status;
        $demo->description    =  $request->description;
        if($request->hasFile('image')){
            if ($demo->image != null)
                File::delete(public_path($demo->image)); //Old image delete
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/demo/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $demo->image   = $folder_path . $image_new_name;
        }
        try {
            $demo->save();
            return back()->withToastSuccess('Successfully updated.');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demo $demo)
    {
        try {
            if ($demo->image != null)
                File::delete(public_path($demo->image)); //Old image delete
            $demo->delete();
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
