<?php

namespace App\Http\Controllers;

use App\Models\WebDesignPackageOrder;
use Illuminate\Http\Request;

class WebDesignPackageOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webDesignPackageOrders = WebDesignPackageOrder::orderBy('id', 'desc')->get();
        return view('backend.order.web-design-package.index', compact('webDesignPackageOrders'));
    }
    public function order_web_design_package_api()
    {
        return $webDesignPackageOrders = WebDesignPackageOrder::orderBy('id', 'desc')->get();
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
     * @param  \App\Models\WebDesignPackageOrder  $webDesignPackageOrder
     * @return \Illuminate\Http\Response
     */
    public function show(WebDesignPackageOrder $webDesignPackageOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebDesignPackageOrder  $webDesignPackageOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(WebDesignPackageOrder $webDesignPackageOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebDesignPackageOrder  $webDesignPackageOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebDesignPackageOrder $webDesignPackageOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebDesignPackageOrder  $webDesignPackageOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebDesignPackageOrder $webDesignPackageOrder)
    {
        try {
            $webDesignPackageOrder->delete();
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
