<?php

namespace App\Http\Controllers;

use App\Models\BulkSms;
use Illuminate\Http\Request;

class BulkSmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulkSms = BulkSms::orderBy('id', 'desc')->get();
        return view('backend.package.bulk-sms.index', compact('bulkSms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.package.bulk-sms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:bulk_sms,name',
            'price' => 'required|string',
            'sms_amount' => 'required|string',
            'description'   => 'required|string',
        ]);
        $bulk_sms = new BulkSms();
        $bulk_sms->name = $request->name;
        $bulk_sms->price = $request->price;
        $bulk_sms->sms_amount = $request->sms_amount;
        $bulk_sms->description = $request->description;

        try {
            $bulk_sms->save();
            return redirect()->route('bulkSms.index')->withToastSuccess('Successfully Saved');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BulkSms  $bulkSms
     * @return \Illuminate\Http\Response
     */
    public function show(BulkSms $bulkSms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BulkSms  $bulkSms
     * @return \Illuminate\Http\Response
     */
    public function edit(BulkSms $bulkSm)
    {
        return view('backend.package.bulk-sms.edit', compact('bulkSm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BulkSms  $bulkSms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BulkSms $bulkSm)
    {
        $request->validate([
            'name' => 'required|string|unique:bulk_sms,name,'.$bulkSm->id,
            'price' => 'required|string',
            'sms_amount' => 'required|string',
            'description'   => 'required|string',
        ]);
        $bulkSms = $bulkSm;
        $bulkSms->name = $request->name;
        $bulkSms->price = $request->price;
        $bulkSms->sms_amount = $request->sms_amount;
        $bulkSms->description = $request->description;

        try {
            $bulkSms->save();
            return redirect()->route('bulkSms.index')->withToastSuccess('Successfully Updated');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BulkSms  $bulkSms
     * @return \Illuminate\Http\Response
     */
    public function destroy(BulkSms $bulkSm)
    {

        try {
            $bulkSm->delete();

            return response()->json([
                'type' => 'success',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
                'message' => $exception->getMessage(),
            ]);
        }
    }
}
