<?php

namespace App\Http\Controllers;

use App\Models\VpnPackage;
use Illuminate\Http\Request;

class VpnPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vpnPackages = VpnPackage::orderBy('id', 'desc')->get();
        return view('backend.package.vpn-package.index', compact('vpnPackages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.package.vpn-package.create');
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
            'title' => 'required|string|unique:vpn_packages,title',
            'monthly_price' => 'required|string',
            'description'   => 'required|string',
        ]);
        $vpn_package = new VpnPackage();
        $vpn_package->title = $request->title;
        $vpn_package->monthly_price = $request->monthly_price;
        $vpn_package->description = $request->description;

        try {
            $vpn_package->save();
            return redirect()->route('vpnPackage.index')->withToastSuccess('Successfully Saved');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VpnPackage  $vpnPackage
     * @return \Illuminate\Http\Response
     */
    public function show(VpnPackage $vpnPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VpnPackage  $vpnPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(VpnPackage $vpnPackage)
    {
        return view('backend.package.vpn-package.edit', compact('vpnPackage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VpnPackage  $vpnPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VpnPackage $vpnPackage)
    {
        $request->validate([
            'title' => 'required|string|unique:vpn_packages,title,'.$vpnPackage->id,
            'monthly_price' => 'required|string',
            'description'   => 'required|string',
        ]);
        $vpn_package = $vpnPackage;
        $vpn_package->title = $request->title;
        $vpn_package->monthly_price = $request->monthly_price;
        $vpn_package->description = $request->description;

        try {
            $vpn_package->save();
            return redirect()->route('vpnPackage.index')->withToastSuccess('Successfully Updated');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VpnPackage  $vpnPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(VpnPackage $vpnPackage)
    {
        try {
            $vpnPackage->delete();
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
