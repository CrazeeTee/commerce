<?php

namespace App\Http\Controllers;

use App\Shop;
use Intervention;
use Illuminate\Http\Request;
use App\Http\Requests\ShopUpdateRequest;
use App\Http\Requests\ShopUploadRequest;
use App\Http\Requests\ShopUploadAvatarRequest;

class ShopController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:shop');
        $this->middleware('shop');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        return view('shop.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        return view('shop.edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ShopUpdateRequest|Request $request
     * @param  \App\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function update(ShopUpdateRequest $request, Shop $shop)
    {
        $input = $request->all();

        $shop->update($input);

        return redirect()->route('shop.show', ['shop' => $shop->unique])->with('success', 'Profile updated.');
    }

    /**
     * Show the form for uploading profile for the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function getUploadAvatar(Shop $shop)
    {
        return view('shop.avatar', compact('shop'));
    }

    /**
     * Upload the specified resource in storage.
     *
     * @param ShopUploadAvatarRequest|Request $request
     * @param  \App\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function uploadAvatar(ShopUploadAvatarRequest $request, Shop $shop)
    {
        $avatar=$request->file('avatar');
        $ext='.png';

        $avatar_name = $shop->id.$shop->unique.$ext;
        $avatar_path = 'storage/photos/avatars/';

        if (!file_exists(public_path($avatar_path))):
            mkdir(public_path($avatar_path), 0777, true);
        endif;

        $save_file = public_path($avatar_path.$avatar_name);

        Intervention::make($avatar)->resize(400, 400)->save($save_file);

        $shop->avatar = $avatar_name;
        $shop->save();

        return redirect()->route('shop.profile', ['shop' => $shop->unique])->with('success', 'Profile pic uploaded.');
    }

    /**
     * Show the form for uploading images for the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function getUploadForm(Shop $shop)
    {
        return view('shop.upload', compact('shop'));
    }

    /**
     * Upload the specified resource in storage.
     *
     * @param ShopUploadRequest|Request $request
     * @param  \App\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function upload(ShopUploadRequest $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
