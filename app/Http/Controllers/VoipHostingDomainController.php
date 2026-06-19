<?php

namespace App\Http\Controllers;

use App\Models\VoipHostingDomain;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class VoipHostingDomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voipHostingDomains = VoipHostingDomain::orderBy('id', 'desc')->get();
        return view('backend.voip-hosting-domain.index', compact('voipHostingDomains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.voip-hosting-domain.create');
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
            'title' => 'required|min:3|string|unique:voip_hosting_domains,title',
            'image' => 'required|image',
            'benefit_image' => 'required|image',
            'description'   => 'required|string',
            'benefit'   => 'required|string',
        ]);

        $voipHostingDomain = new VoipHostingDomain();
        $voipHostingDomain->title = $request->title;
        $voipHostingDomain->description = $request->description;
        $voipHostingDomain->benefit = $request->benefit;

        if($request->hasFile('image')){
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/voip-hosting-domain/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $voipHostingDomain->image   = $folder_path . $image_new_name;
        }
        if($request->hasFile('benefit_image')){
            $image             = $request->file('benefit_image');
            $folder_path       = 'uploads/images/voip-hosting-domain/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $voipHostingDomain->benefit_image   = $folder_path . $image_new_name;
        }

        try {
            $voipHostingDomain->save();
            return redirect()->route('voipHostingDomain.index')->withToastSuccess('Successfully Saved');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VoipHostingDomain  $voipHostingDomain
     * @return \Illuminate\Http\Response
     */
    public function show(VoipHostingDomain $voipHostingDomain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VoipHostingDomain  $voipHostingDomain
     * @return \Illuminate\Http\Response
     */
    public function edit(VoipHostingDomain $voipHostingDomain)
    {
        return view('backend.voip-hosting-domain.edit', compact('voipHostingDomain'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VoipHostingDomain  $voipHostingDomain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VoipHostingDomain $voipHostingDomain)
    {
        $request->validate([
            'title' => 'required|min:3|string|unique:voip_hosting_domains,title,'.$voipHostingDomain->id,
            'image' => 'nullable|image',
            'benefit_image' => 'nullable|image',
            'description'   => 'required|string',
            'benefit'   => 'required|string',
        ]);

        $voipHostingDomain->title = $request->title;
        $voipHostingDomain->description = $request->description;
        $voipHostingDomain->benefit = $request->benefit;

        if($request->hasFile('image')){
            if ($voipHostingDomain->image != null)
                File::delete(public_path($voipHostingDomain->image)); //Old image delete
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/voip-hosting-domain/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $voipHostingDomain->image   = $folder_path . $image_new_name;
        }
        if($request->hasFile('benefit_image')){
            if ($voipHostingDomain->benefit_image != null)
                File::delete(public_path($voipHostingDomain->benefit_image)); //Old image delete
            $image             = $request->file('benefit_image');
            $folder_path       = 'uploads/images/voip-hosting-domain/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $voipHostingDomain->benefit_image   = $folder_path . $image_new_name;
        }

        try {
            $voipHostingDomain->save();
            return redirect()->route('voipHostingDomain.index')->withToastSuccess('Successfully Saved');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VoipHostingDomain  $voipHostingDomain
     * @return \Illuminate\Http\Response
     */
    public function destroy(VoipHostingDomain $voipHostingDomain)
    {
        try {
            if ($voipHostingDomain->image != null)
                File::delete(public_path($voipHostingDomain->image)); //Old image delete
            if ($voipHostingDomain->benefit_image != null)
                 File::delete(public_path($voipHostingDomain->benefit_image)); //Old image delete
            $voipHostingDomain->delete();
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
