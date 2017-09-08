<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests\AdminUpdateRequest;
use App\Http\Requests\AdminUploadRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return view('admin.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateRequest|Request $request
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUpdateRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Show the form for uploading images for the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function getUploadForm(Admin $admin)
    {
        return view('admin.upload', compact('admin'));
    }

    /**
     * Upload the specified resource in storage.
     *
     * @param AdminUploadRequest|Request $request
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function upload(AdminUploadRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
