<?php

namespace App\Http\Controllers;

use App\Models\VoipDialerOrder;
use Illuminate\Http\Request;

class VoipDialerOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voipDialerOrders = VoipDialerOrder::orderBy('id', 'desc')->get();
        return view('backend.order.voip-dialer.index', compact('voipDialerOrders'));
    }
    public function order_voip_dialer_api()
    {
        return $voipDialerOrders = VoipDialerOrder::orderBy('id', 'desc')->get();
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
     * @param  \App\Models\VoipDialerOrder  $voipDialerOrder
     * @return \Illuminate\Http\Response
     */
    public function show(VoipDialerOrder $voipDialerOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VoipDialerOrder  $voipDialerOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(VoipDialerOrder $voipDialerOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VoipDialerOrder  $voipDialerOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VoipDialerOrder $voipDialerOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VoipDialerOrder  $voipDialerOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(VoipDialerOrder $voipDialerOrder)
    {
        try {
            $voipDialerOrder->delete();
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
