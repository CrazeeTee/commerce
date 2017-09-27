<?php

namespace App\Http\Controllers;

use App\User;
use Intervention;
use Illuminate\Http\Request;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserUploadAvatarRequest;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest|Request $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $input = $request->all();

        $user->update($input);

        return redirect()->route('user.show', ['user' => $user->unique])->with('success', 'Profile updated.');
    }

    /**
     * Show the form for uploading profile for the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function getUploadAvatar(User $user)
    {
        return view('user.avatar', compact('user'));
    }

    /**
     * Upload the specified resource in storage.
     *
     * @param UserUploadAvatarRequest|Request $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function uploadAvatar(UserUploadAvatarRequest $request, User $user)
    {
        $avatar=$request->file('avatar');
        $ext='.png';

        $avatar_name = $user->id.$user->unique.$ext;
        $avatar_path = 'storage/photos/avatars/';

        if (!file_exists(public_path($avatar_path))):
            mkdir(public_path($avatar_path), 0777, true);
        endif;

        $save_file = public_path($avatar_path.$avatar_name);

        Intervention::make($avatar)->resize(400, 400)->save($save_file);

        $user->avatar = $avatar_name;
        $user->save();

        return redirect()->route('user.show', ['user' => $user->unique])->with('success', 'Profile pic uploaded.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('index')->with('warning', 'User deleted. Hope we Helped you Grow.');
    }
}
