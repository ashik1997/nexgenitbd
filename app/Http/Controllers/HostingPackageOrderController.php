<?php

namespace App\Http\Controllers;

use App\Models\HostingPackageOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class HostingPackageOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hostingPackageOrders = HostingPackageOrder::orderBy('id', 'desc')->get();
        return view('backend.order.hosting.index', compact('hostingPackageOrders'));
    }
    public function order_hosting_api()
    {
        return $hostingPackageOrders = HostingPackageOrder::orderBy('id', 'desc')->get();
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
     * @param  \App\Models\HostingPackageOrder  $hostingPackageOrder
     * @return \Illuminate\Http\Response
     */
    public function show(HostingPackageOrder $hostingPackageOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HostingPackageOrder  $hostingPackageOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(HostingPackageOrder $hostingPackageOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HostingPackageOrder  $hostingPackageOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HostingPackageOrder $hostingPackageOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HostingPackageOrder  $hostingPackageOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(HostingPackageOrder $hostingPackageOrder)
    {
        try {
            if ($hostingPackageOrder->image != null)
                File::delete(public_path($hostingPackageOrder->image)); //Old image delete
            $hostingPackageOrder->delete();
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
