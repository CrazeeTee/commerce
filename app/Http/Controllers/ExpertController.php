<?php

namespace App\Http\Controllers;

use App\Expert;
use Intervention;
use Illuminate\Http\Request;
use App\Http\Requests\UploadImageRequest;
use App\Http\Requests\UploadAvatarRequest;
use App\Http\Requests\UpdateProfileRequest;

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
     * @param UpdateProfileRequest|Request $request
     * @param  \App\Expert $expert
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, Expert $expert)
    {
        $input = $request->all();

        $expert->update($input);

        return redirect()->route('expert.show', $expert->unique)->with('success', 'Profile updated.');
    }

    /**
     * Show the form for uploading profile for the specified resource.
     *
     * @param  \App\Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function getUploadAvatar(Expert $expert)
    {
        return view('expert.avatar', compact('expert'));
    }

    /**
     * Upload the specified resource in storage.
     *
     * @param UploadAvatarRequest|Request $request
     * @param  \App\Expert $expert
     * @return \Illuminate\Http\Response
     */
    public function uploadAvatar(UploadAvatarRequest $request, Expert $expert)
    {
        $avatar=$request->file('avatar');
        $ext='.png';

        $avatar_name = $expert->id.uniqid().$ext;
        $avatar_path = 'app/public/photos/avatars/';

        if (!file_exists(storage_path($avatar_path))):
            mkdir(storage_path($avatar_path), 0777, true);
        endif;

        $save_file = storage_path($avatar_path.$avatar_name);

        Intervention::make($avatar)->resize(400, 400)->save($save_file);

        $expert->avatar = $avatar_name;
        $expert->save();

        return redirect()->route('expert.show', $expert->unique)->with('success', 'Profile pic uploaded.');
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
     * @param UploadImageRequest|Request $request
     * @param  \App\Expert $expert
     * @return \Illuminate\Http\Response
     */
    public function upload(UploadImageRequest $request, Expert $expert)
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
        $expert->softDelete();

        return redirect()->route('index')->with('warning', 'Deleted. Hope we Helped you Grow.');
    }
}
