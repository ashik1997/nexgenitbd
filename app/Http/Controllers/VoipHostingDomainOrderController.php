<?php

namespace App\Http\Controllers;

use App\Models\VoipHostingDomainOrder;
use Illuminate\Http\Request;

class VoipHostingDomainOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voipHostingDomainOrders = VoipHostingDomainOrder::orderBy('id', 'desc')->get();
        return view('backend.order.voip-hosting-domain.index', compact('voipHostingDomainOrders'));
    }
    public function order_voip_hosting_domain_api()
    {
        return $voipHostingDomainOrders = VoipHostingDomainOrder::orderBy('id', 'desc')->get();
        
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
     * @param  \App\Models\VoipHostingDomainOrder  $voipHostingDomainOrder
     * @return \Illuminate\Http\Response
     */
    public function show(VoipHostingDomainOrder $voipHostingDomainOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VoipHostingDomainOrder  $voipHostingDomainOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(VoipHostingDomainOrder $voipHostingDomainOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VoipHostingDomainOrder  $voipHostingDomainOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VoipHostingDomainOrder $voipHostingDomainOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VoipHostingDomainOrder  $voipHostingDomainOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(VoipHostingDomainOrder $voipHostingDomainOrder)
    {
        try{
            $voipHostingDomainOrder->delete();
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
