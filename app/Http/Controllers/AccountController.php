<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileValidate;
use App\Models\User;
use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function update(UpdateProfileValidate $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $user->update(request()->all());

        if (request()->hasFile('store_logo')) {
            $img = request()->file('store_logo');
            $fileName = $this->resizeImage($img, 'store');
            Storage::disk('local')->delete('public/store/images/' . $user->store_logo);
            $user->store_logo = $fileName;
        }

        if (request()->hasFile('instagram_image')) {
            $img = request()->file('instagram_image');
            $fileName = $this->resizeImage($img, 'instagram');
            if (!empty($user->instagram_image)) {
                Storage::disk('local')->delete('public/instagram/images/' . $user->instagram_image);
            }
            $user->instagram_image = $fileName;
        }

        if (request()->hasFile('snapchat_image')) {
            $img = request()->file('snapchat_image');
            $fileName = $this->resizeImage($img, 'snapchat');
            if (!empty($user->snapchat_image)) {
                Storage::disk('local')->delete('public/snapchat/images/' . $user->snapchat_image);
            }
            $user->snapchat_image = $fileName;
        }

        if (request()->hasFile('pinterest_image')) {
            $img = request()->file('pinterest_image');
            $fileName = $this->resizeImage($img, 'pinterest');
            if (!empty($user->pinterest_image)) {
                Storage::disk('local')->delete('public/pinterest/images/' . $user->pinterest_image);
            }
            $user->pinterest_image = $fileName;
        }

        if (request()->hasFile('tiktok_image')) {
            $img = request()->file('tiktok_image');
            $fileName = $this->resizeImage($img, 'tiktok');
            if (!empty($user->tiktok_image)) {
                Storage::disk('local')->delete('public/tiktok/images/' . $user->tiktok_image);
            }
            $user->tiktok_image = $fileName;
        }
        $user->save();
        return response()->json(['msg' => 'Profile Updated!'], 200);
    }
    public function resizeImage($image, $type)
    {
        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $upload = Image::make($image->getRealPath());
        $upload->resize(512, 512, function ($const) {
            $const->aspectRatio();
        });
        $upload->stream();
        Storage::disk('local')->put('public/' . $type . '/images/' . $fileName, $upload, 'public');
        return $fileName;
    }
}
