<?php

namespace App\Http\Controllers;

use App\Shop;
use Intervention;
use Illuminate\Http\Request;
use App\Http\Requests\UploadAvatarRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UploadProductRequest;

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
     * @param UpdateProfileRequest|Request $request
     * @param  \App\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, Shop $shop)
    {
        $input = $request->all();

        $shop->update($input);

        return redirect()->route('shop.show', $shop->unique)->with('success', 'Profile updated.');
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
     * @param UploadAvatarRequest|Request $request
     * @param  \App\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function uploadAvatar(UploadAvatarRequest $request, Shop $shop)
    {
        $avatar=$request->file('avatar');
        $ext='.png';

        $avatar_name = $shop->id.uniqid().$ext;
        $avatar_path = 'app/public/photos/avatars/';

        if (!file_exists(storage_path($avatar_path))):
            mkdir(storage_path($avatar_path), 0777, true);
        endif;

        $save_file = storage_path($avatar_path.$avatar_name);

        Intervention::make($avatar)->resize(400, 400)->save($save_file);

        $shop->avatar = $avatar_name;
        $shop->save();

        return redirect()->route('shop.show', $shop->unique)->with('success', 'Profile pic uploaded.');
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
     * @param UploadProductRequest|Request $request
     * @param  \App\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function upload(UploadProductRequest $request, Shop $shop)
    {
        $slug=str_slug($request->name);
        $unique=$slug.uniqid();

        $image=$request->file('image');
        $ext=$image->getClientOriginalExtension();

        $image_name=$unique.'.'.$ext;

        $image_path='app/public/photos/images/';

        $image_thumb_500='app/public/photos/thumbs/500/';
        $image_thumb_450='app/public/photos/thumbs/450/';
        $image_thumb_350='app/public/photos/thumbs/350/';
        $image_thumb_250='app/public/photos/thumbs/250/';
        $image_thumb_150='app/public/photos/thumbs/150/';
        $image_thumb_100='app/public/photos/thumbs/100/';
        $image_thumb_50='app/public/photos/thumbs/50/';

        if (! file_exists(storage_path($image_path))):
            mkdir(storage_path($image_path), 0777, true);
        endif;
        if (! file_exists(storage_path($image_thumb_500))):
            mkdir(storage_path($image_thumb_500), 0777, true);
        endif;
        if (! file_exists(storage_path($image_thumb_450))):
            mkdir(storage_path($image_thumb_450), 0777, true);
        endif;
        if (! file_exists(storage_path($image_thumb_350))):
            mkdir(storage_path($image_thumb_350), 0777, true);
        endif;
        if (! file_exists(storage_path($image_thumb_250))):
            mkdir(storage_path($image_thumb_250), 0777, true);
        endif;
        if (! file_exists(storage_path($image_thumb_150))):
            mkdir(storage_path($image_thumb_150), 0777, true);
        endif;
        if (! file_exists(storage_path($image_thumb_100))):
            mkdir(storage_path($image_thumb_100), 0777, true);
        endif;
        if (! file_exists(storage_path($image_thumb_50))):
            mkdir(storage_path($image_thumb_50), 0777, true);
        endif;

        $save_file=storage_path($image_path.$image_name);
        $save_thumb_500=storage_path($image_thumb_500.$image_name);
        $save_thumb_450=storage_path($image_thumb_450.$image_name);
        $save_thumb_350=storage_path($image_thumb_350.$image_name);
        $save_thumb_250=storage_path($image_thumb_250.$image_name);
        $save_thumb_150=storage_path($image_thumb_150.$image_name);
        $save_thumb_100=storage_path($image_thumb_100.$image_name);
        $save_thumb_50=storage_path($image_thumb_50.$image_name);

        Intervention::make($image)->save($save_file);

        Intervention::make($image)->resize(500, 500)->save($save_thumb_500);
        Intervention::make($image)->resize(450, 450)->save($save_thumb_450);
        Intervention::make($image)->resize(350, 350)->save($save_thumb_350);
        Intervention::make($image)->resize(250, 250)->save($save_thumb_250);
        Intervention::make($image)->resize(150, 150)->save($save_thumb_150);
        Intervention::make($image)->resize(100, 100)->save($save_thumb_100);
        Intervention::make($image)->resize(50, 50)->save($save_thumb_50);

        $shop->products()->create([
            'slug' => $slug,
            'unique' => $unique,
            'image' => $image_name,
            'name' => $request->name,
            'description' => $request->description,
            'size' => $request->size,
            'color' => $request->color,
            'new_price' => $request->new_price,
            'old_price' => $request->old_price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('shop.show', $shop->unique)->with('success', 'Product uploaded.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        $shop->softDelete();

        return redirect()->route('index')->with('warning', 'Deleted. Hope we Helped you Grow.');
    }
}
