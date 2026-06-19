<?php

namespace App\Http\Controllers;

use App\Models\DomainOrder;
use Illuminate\Http\Request;

class DomainOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domainOrders = DomainOrder::orderBy('id', 'desc')->get();
        return view('backend.order.domain.index', compact('domainOrders'));
    }
    public function order_domain_api()
    {
        return $domainOrders = DomainOrder::orderBy('id', 'desc')->get();
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
     * @param  \App\Models\DomainOrder  $domainOrder
     * @return \Illuminate\Http\Response
     */
    public function show(DomainOrder $domainOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DomainOrder  $domainOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(DomainOrder $domainOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DomainOrder  $domainOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DomainOrder $domainOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DomainOrder  $domainOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(DomainOrder $domainOrder)
    {
        try {
            $domainOrder->delete();
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
