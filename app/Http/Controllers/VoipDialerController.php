<?php

namespace App\Http\Controllers;

use App\Models\VoipDialer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class VoipDialerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voipDialers = VoipDialer::orderBy('id', 'desc')->get();
        return view('backend.voip-dialer.index', compact('voipDialers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.voip-dialer.create');
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
            'title' => 'required|min:3|string|unique:voip_dialers,title',
            'image' => 'required|image',
            'description'   => 'required|string',
        ]);

        $voipDialer = new VoipDialer();
        $voipDialer->title = $request->title;
        $voipDialer->description = $request->description;

        if($request->hasFile('image')){
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/voip-dialer/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $voipDialer->image   = $folder_path . $image_new_name;
        }

        try {
            $voipDialer->save();
            return redirect()->route('voipDialer.index')->withToastSuccess('Successfully Saved');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VoipDialer  $voipDialer
     * @return \Illuminate\Http\Response
     */
    public function show(VoipDialer $voipDialer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VoipDialer  $voipDialer
     * @return \Illuminate\Http\Response
     */
    public function edit(VoipDialer $voipDialer)
    {
        return view('backend.voip-dialer.edit', compact('voipDialer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VoipDialer  $voipDialer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VoipDialer $voipDialer)
    {
        $request->validate([
            'title' => 'required|min:3|string|unique:voip_dialers,title,'.$voipDialer->id,
            'image' => 'nullable|image',
            'description'   => 'required|string',
        ]);

        $voipDialer = $voipDialer;
        $voipDialer->title = $request->title;
        $voipDialer->description = $request->description;

        if($request->hasFile('image')){
            if ($voipDialer->image != null)
            File::delete(public_path($voipDialer->image)); //Old image delete
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/voip-dialer/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $voipDialer->image   = $folder_path . $image_new_name;
        }

        try {
            $voipDialer->save();
            return redirect()->route('voipDialer.index')->withToastSuccess('Successfully Updated');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VoipDialer  $voipDialer
     * @return \Illuminate\Http\Response
     */
    public function destroy(VoipDialer $voipDialer)
    {
        try {
            if ($voipDialer->image != null)
             File::delete(public_path($voipDialer->image)); //Old image delete
            $voipDialer->delete();
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
