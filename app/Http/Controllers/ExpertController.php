<?php

namespace App\Http\Controllers;

use App\Expert;
use App\Http\Requests\ExpertUpdateRequest;
use App\Http\Requests\ExpertUploadRequest;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:expert');
        $this->middleware('expert');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expert.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function show(Expert $expert)
    {
        return view('expert.show', compact('expert'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function edit(Expert $expert)
    {
        return view('expert.edit', compact('expert'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ExpertUpdateRequest|Request $request
     * @param  \App\Expert $expert
     * @return \Illuminate\Http\Response
     */
    public function update(ExpertUpdateRequest $request, Expert $expert)
    {
        //
    }

    /**
     * Show the form for uploading images for the specified resource.
     *
     * @param  \App\Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function getUploadForm(Expert $expert)
    {
        return view('expert.upload', compact('expert'));
    }

    /**
     * Upload the specified resource in storage.
     *
     * @param ExpertUploadRequest|Request $request
     * @param  \App\Expert $expert
     * @return \Illuminate\Http\Response
     */
    public function upload(ExpertUploadRequest $request, Expert $expert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expert $expert)
    {
        //
    }
}
