<?php

namespace App\Http\Controllers;

use App\Models\WebDesignOrder;
use Illuminate\Http\Request;

class WebDesignOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webDesignOrders = WebDesignOrder::orderBy('id', 'desc')->get();
        return view('backend.order.web-design.index', compact('webDesignOrders'));
    }
    public function order_web_design_api()
    {
        return $webDesignOrders = WebDesignOrder::orderBy('id', 'desc')->get();
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
     * @param  \App\Models\WebDesignOrder  $webDesignOrder
     * @return \Illuminate\Http\Response
     */
    public function show(WebDesignOrder $webDesignOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebDesignOrder  $webDesignOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(WebDesignOrder $webDesignOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebDesignOrder  $webDesignOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebDesignOrder $webDesignOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebDesignOrder  $webDesignOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebDesignOrder $webDesignOrder)
    {
        try {
            $webDesignOrder->delete();
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
