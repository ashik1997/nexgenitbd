<?php

namespace App\Http\Controllers;

use App\Models\VpnPackageOrder;
use Illuminate\Http\Request;

class VpnPackageOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vpnPackageOrders = VpnPackageOrder::orderBy('id', 'desc')->get();
        return view('backend.order.vpn-package.index', compact('vpnPackageOrders'));
    }
    public function order_vpn_package_api()
    {
        return $vpnPackageOrders = VpnPackageOrder::orderBy('id', 'desc')->get();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VpnPackageOrder  $vpnPackageOrder
     * @return \Illuminate\Http\Response
     */
    public function show(VpnPackageOrder $vpnPackageOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VpnPackageOrder  $vpnPackageOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(VpnPackageOrder $vpnPackageOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VpnPackageOrder  $vpnPackageOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VpnPackageOrder $vpnPackageOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VpnPackageOrder  $vpnPackageOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(VpnPackageOrder $vpnPackageOrder)
    {
        try {
            $vpnPackageOrder->delete();
            return response()->json([
                'type' => 'success',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
            ]);
        }
    }
}
