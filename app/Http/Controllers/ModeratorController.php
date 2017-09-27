<?php

namespace App\Http\Controllers;

use App\Admin;
use Intervention;
use Illuminate\Http\Request;
use App\Http\Requests\AdminUpdateRequest;
use App\Http\Requests\AdminUploadRequest;
use App\Http\Requests\AdminUploadAvatarRequest;

class ModeratorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('moderator');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('moderator.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return view('moderator.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('moderator.edit', compact('admin'));
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
        $input = $request->all();

        $admin->update($input);

        return redirect()->route('moderator.show', ['admin' => $admin->unique])->with('success', 'Profile updated.');
    }

    /**
     * Show the form for uploading profile for the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function getUploadAvatar(Admin $admin)
    {
        return view('moderator.avatar', compact('admin'));
    }

    /**
     * Upload the specified resource in storage.
     *
     * @param AdminUploadAvatarRequest|Request $request
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function uploadAvatar(AdminUploadAvatarRequest $request, Admin $admin)
    {
        $avatar=$request->file('avatar');
        $ext='.png';

        $avatar_name = $admin->id.$admin->unique.$ext;
        $avatar_path = 'storage/photos/avatars/';

        if (!file_exists(public_path($avatar_path))):
            mkdir(public_path($avatar_path), 0777, true);
        endif;

        $save_file = public_path($avatar_path.$avatar_name);

        Intervention::make($avatar)->resize(400, 400)->save($save_file);

        $admin->avatar = $avatar_name;
        $admin->save();

        return redirect()->route('moderator.show', ['admin' => $admin->unique])->with('success', 'Profile pic uploaded.');
    }

    /**
     * Show the form for uploading images for the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function getUploadForm(Admin $admin)
    {
        return view('moderator.upload', compact('admin'));
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
