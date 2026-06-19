<?php

namespace App\Http\Controllers;

use App\Jobs\SendSubscriberEmail;
use App\Models\WebsiteSubscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Yajra\DataTables\Facades\DataTables;

class WebsiteSubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = WebsiteSubscribe::all();
            return datatables::of($data)
               ->addColumn('email', function ($data) {
                    return '<a href="mailto:'.$data->email.'">'.$data->email.'</a>';
                })
                ->addColumn('action', function ($data) {
                    return '<button class="text-white btn btn-danger " onclick="delete_function(this)" value="'. route('websiteSubscribe.destroy', $data).'">Delete</button>';
                })
                ->rawColumns(['email','action'])
                ->make(true);
        } else {
            return view('backend.website.subscribe.index');
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
     * @param  \App\Models\WebsiteSubscribe  $websiteSubscribe
     * @return \Illuminate\Http\Response
     */
    public function show(WebsiteSubscribe $websiteSubscribe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebsiteSubscribe  $websiteSubscribe
     * @return \Illuminate\Http\Response
     */
    public function edit(WebsiteSubscribe $websiteSubscribe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebsiteSubscribe  $websiteSubscribe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebsiteSubscribe $websiteSubscribe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebsiteSubscribe  $websiteSubscribe
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteSubscribe $websiteSubscribe)
    {
        try {
            $websiteSubscribe->delete();
            return response()->json([
                'type' => 'success',
            ]);
        }catch (\Exception$exception){
            return response()->json([
                'type' => 'error',
            ]);
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function sendEmailToSubscriber(Request $request){
        $request->validate([
            'description'=> 'required|string',
        ]);
        //Send  to job
        dispatch(new SendSubscriberEmail($request->description))->delay(now()->addSeconds(5));
        //Run queue for one time
        Artisan::call('queue:work --once');
        return back()->withToastSuccess('Successfully send email.');
    }
}
