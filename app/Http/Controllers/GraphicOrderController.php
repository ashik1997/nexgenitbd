<?php

namespace App\Http\Controllers;

use App\Models\GraphicOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class GraphicOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $graphicOrders = GraphicOrder::orderBy('id', 'desc')->get();
        return view('backend.order.graphic.index', compact('graphicOrders'));
    }
    public function order_graphic_api()
    {
        return $graphicOrders = GraphicOrder::orderBy('id', 'desc')->get();
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
     * @param  \App\Models\GraphicOrder  $graphicOrder
     * @return \Illuminate\Http\Response
     */
    public function show(GraphicOrder $graphicOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GraphicOrder  $graphicOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(GraphicOrder $graphicOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GraphicOrder  $graphicOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GraphicOrder $graphicOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GraphicOrder  $graphicOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(GraphicOrder $graphicOrder)
    {
        try {
            if ($graphicOrder->image != null)
                File::delete(public_path($graphicOrder->image)); //Old image delete
            $graphicOrder->delete();
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
