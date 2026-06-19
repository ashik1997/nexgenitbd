<?php

namespace App\Http\Controllers;

use App\Models\WebDesignPackage;
use Illuminate\Http\Request;

class WebDesignPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webDesignPackages = WebDesignPackage::orderBy('id', 'desc')->get();
        return view('backend.package.web-design.index', compact('webDesignPackages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.package.web-design.create');
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
            'title' => 'required|string|unique:web_design_packages,title',
            'price' => 'required|string',
            'description'   => 'required|string',
        ]);
        $webDesignPackage = new WebDesignPackage();
        $webDesignPackage->title = $request->title;
        $webDesignPackage->price = $request->price;
        $webDesignPackage->description = $request->description;

        try {
            $webDesignPackage->save();
            return redirect()->route('webDesignPackage.index')->withToastSuccess('Successfully Saved');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebDesignPackage  $webDesignPackage
     * @return \Illuminate\Http\Response
     */
    public function show(WebDesignPackage $webDesignPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebDesignPackage  $webDesignPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(WebDesignPackage $webDesignPackage)
    {
        return view('backend.package.web-design.edit', compact('webDesignPackage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebDesignPackage  $webDesignPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebDesignPackage $webDesignPackage)
    {
        $request->validate([
            'title' => 'required|string|unique:web_design_packages,title,'.$webDesignPackage->id,
            'price' => 'required|string',
            'description'   => 'required|string',
        ]);

        $webDesignPackage->title = $request->title;
        $webDesignPackage->price = $request->price;
        $webDesignPackage->description = $request->description;

        try {
            $webDesignPackage->save();
            return redirect()->route('webDesignPackage.index')->withToastSuccess('Successfully Updated');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebDesignPackage  $webDesignPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebDesignPackage $webDesignPackage)
    {
        try {
            $webDesignPackage->delete();
            return response()->json([
                'type' => 'success',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
            ]);
        }
    }
}
