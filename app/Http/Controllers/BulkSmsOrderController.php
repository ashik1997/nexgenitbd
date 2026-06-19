<?php

namespace App\Http\Controllers;

use App\Models\BulkSmsOrder;
use Illuminate\Http\Request;

class BulkSmsOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulkSmsOrders = BulkSmsOrder::orderBy('id', 'desc')->get();
        return view('backend.order.bulk-sms-package.index', compact('bulkSmsOrders'));
    }
    public function order_bulksms_api()
    {
        $bulkSmsOrders = BulkSmsOrder::where('is_process_complete','0')->get();
        return json_encode($bulkSmsOrders);
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
     * @param  \App\Models\BulkSmsOrder  $bulkSmsOrder
     * @return \Illuminate\Http\Response
     */
    public function show(BulkSmsOrder $bulkSmsOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BulkSmsOrder  $bulkSmsOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(BulkSmsOrder $bulkSmsOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BulkSmsOrder  $bulkSmsOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BulkSmsOrder $bulkSmsOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BulkSmsOrder  $bulkSmsOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(BulkSmsOrder $bulkSmsOrder)
    {
        try {
            $bulkSmsOrder->delete();
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
