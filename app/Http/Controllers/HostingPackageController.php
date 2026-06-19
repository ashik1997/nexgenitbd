<?php

namespace App\Http\Controllers;

use App\Models\HostingPackage;
use Illuminate\Http\Request;

class HostingPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hostingPackages = HostingPackage::orderBy('id', 'desc')->get();
        return view('backend.package.hosting-package.index', compact('hostingPackages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.package.hosting-package.create');
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
            'name' => 'required|string|unique:hosting_packages,name',
            'yearly_price' => 'required|string',
            'description'   => 'required|string',
        ]);
        $hosting_package = new HostingPackage();
        $hosting_package->name = $request->name;
        $hosting_package->yearly_price = $request->yearly_price;
        $hosting_package->description = $request->description;

        try {
            $hosting_package->save();
            return redirect()->route('hostingPackage.index')->withToastSuccess('Successfully Saved');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HostingPackage  $hostingPackage
     * @return \Illuminate\Http\Response
     */
    public function show(HostingPackage $hostingPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HostingPackage  $hostingPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(HostingPackage $hostingPackage)
    {
        return view('backend.package.hosting-package.edit', compact('hostingPackage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HostingPackage  $hostingPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HostingPackage $hostingPackage)
    {
        $request->validate([
            'name' => 'required|string|unique:hosting_packages,name,'.$hostingPackage->id,
            'yearly_price' => 'required|string',
            'description'   => 'required|string',
        ]);
        $hosting_package = $hostingPackage;
        $hosting_package->name = $request->name;
        $hosting_package->yearly_price = $request->yearly_price;
        $hosting_package->description = $request->description;

        try {
            $hosting_package->save();
            return redirect()->route('hostingPackage.index')->withToastSuccess('Successfully Updated');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HostingPackage  $hostingPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(HostingPackage $hostingPackage)
    {
        try {
            $hostingPackage->delete();
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
