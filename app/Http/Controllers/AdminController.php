<?php

namespace App\Http\Controllers;

use App\Admin;
use Intervention;
use Illuminate\Http\Request;
use App\Http\Requests\UploadImageRequest;
use App\Http\Requests\UploadAvatarRequest;
use App\Http\Requests\UpdateProfileRequest;

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
     * @param UpdateProfileRequest|Request $request
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, Admin $admin)
    {
        $input = $request->all();

        $admin->update($input);

        return redirect()->route('admin.show', $admin->unique)->with('success', 'Profile updated.');
    }

    /**
     * Show the form for uploading profile for the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function getUploadAvatar(Admin $admin)
    {
        return view('admin.avatar', compact('admin'));
    }

    /**
     * Upload the specified resource in storage.
     *
     * @param UploadAvatarRequest|Request $request
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function uploadAvatar(UploadAvatarRequest $request, Admin $admin)
    {
        $avatar=$request->file('avatar');
        $ext='.png';

        $avatar_name = $admin->id.uniqid().$ext;
        $avatar_path = 'app/public/photos/avatars/';

        if (!file_exists(storage_path($avatar_path))):
            mkdir(storage_path($avatar_path), 0777, true);
        endif;

        $save_file = storage_path($avatar_path.$avatar_name);

        Intervention::make($avatar)->resize(400, 400)->save($save_file);

        $admin->avatar = $avatar_name;
        $admin->save();

        return redirect()->route('admin.show', $admin->unique)->with('success', 'Profile pic uploaded.');
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
     * @param UploadImageRequest|Request $request
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function upload(UploadImageRequest $request, Admin $admin)
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
        $admin->softDelete();

        return redirect()->route('index')->with('warning', 'Deleted. Hope we Helped you Grow.');
    }
}
