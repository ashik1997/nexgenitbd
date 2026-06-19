<?php

namespace App\Http\Controllers;

use App\Models\VisitorActivity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VisitorActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $data = VisitorActivity::all();
            return datatables::of($data)
                ->addColumn('url', function($data) {
                    return '
                    <a target="_blank" class="small" href="'.$data->url.'">'.$data->url.' </a>';
                })
                ->addColumn('create', function($data) {
                    return $data->created_at->format('H:i A d/M/Y');
                })
                ->rawColumns(['create','url'])
                ->make(true);
        }else{
            $visitors = VisitorActivity::all();
            return view('backend.visitor.index', compact('visitors'));
        }
    }

    public function today(Request $request)
    {
        if ($request->ajax()){
            $data = VisitorActivity::whereDate('created_at', Carbon::today())->get();
            return datatables::of($data)
                ->addColumn('url', function($data) {
                    return '
                    <a target="_blank" class="small" href="'.$data->url.'">'.$data->url.' </a>';
                })
                ->addColumn('create', function($data) {
                    return $data->created_at->format('H:i A d/M/Y');
                })
                ->rawColumns(['create','url'])
                ->make(true);
        }else{
            $visitors = VisitorActivity::whereDate('created_at', Carbon::today())->get();
            return view('backend.visitor.index', compact('visitors'));
        }
    }

    public function last_seven_day(Request $request)
    {
        if ($request->ajax()){
            $data = VisitorActivity::where('created_at', '>=', Carbon::today()->subDays(7))->get();
            return datatables::of($data)
                ->addColumn('url', function($data) {
                    return '
                    <a target="_blank" class="small" href="'.$data->url.'">'.$data->url.' </a>';
                })
                ->addColumn('create', function($data) {
                    return $data->created_at->format('H:i A d/M/Y');
                })
                ->rawColumns(['create','url'])
                ->make(true);
        }else{
            $visitors = VisitorActivity::where('created_at', '>=', Carbon::today()->subDays(7))->get();
            return view('backend.visitor.index', compact('visitors'));
        }
    }


    public function last_thirty_day(Request $request)
    {
        if ($request->ajax()){
            $data = VisitorActivity::where('created_at', '>=', Carbon::today()->subDays(30))->get();
            return datatables::of($data)
                ->addColumn('url', function($data) {
                    return '
                    <a target="_blank" class="small" href="'.$data->url.'">'.$data->url.' </a>';
                })
                ->addColumn('create', function($data) {
                    return $data->created_at->format('H:i A d/M/Y');
                })
                ->rawColumns(['create','url'])
                ->make(true);
        }else{
            $visitors = VisitorActivity::where('created_at', '>=', Carbon::today()->subDays(30))->get();
            return view('backend.visitor.index', compact('visitors'));
        }
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
     * @param  \App\Models\VisitorActivity  $visitorActivity
     * @return \Illuminate\Http\Response
     */
    public function show(VisitorActivity $visitorActivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VisitorActivity  $visitorActivity
     * @return \Illuminate\Http\Response
     */
    public function edit(VisitorActivity $visitorActivity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VisitorActivity  $visitorActivity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VisitorActivity $visitorActivity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisitorActivity  $visitorActivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisitorActivity $visitorActivity)
    {
        //
    }
}
