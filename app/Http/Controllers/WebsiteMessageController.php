<?php

namespace App\Http\Controllers;

use App\Models\WebsiteMessage;
use Illuminate\Http\Request;

class WebsiteMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websiteMessages = WebsiteMessage::orderBy('id', 'desc')->get();
        return view('backend.website.message.index', compact('websiteMessages'));
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
     * @param  \App\Models\WebsiteMessage  $websiteMessage
     * @return \Illuminate\Http\Response
     */
    public function show(WebsiteMessage $websiteMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebsiteMessage  $websiteMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(WebsiteMessage $websiteMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebsiteMessage  $websiteMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebsiteMessage $websiteMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebsiteMessage  $websiteMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteMessage $websiteMessage)
    {
        try {
            $websiteMessage->delete();
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
