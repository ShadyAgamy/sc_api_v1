<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationValidate;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function register(RegistrationValidate $request)
    {
        $store_img = request()->file('store_logo');
        $fileName = $this->resizeImage($store_img,'store');
        $user = User::create([
            'username' => request('username'),
            'email' => request('email'),
            'full_name' => request('full_name'),
            'store_name' => request('store_name'),
            'store_logo' => $fileName,
            'password' => Hash::make(request('password')),
            'instagram_username' => request('instagram_username'),
            'snapchat_username' => request('snapchat_username'),
            'pinterest_username' => request('pinterest_username'),
            'tiktok_username' => request('tiktok_username'),
        ]);

        if (request()->hasFile('instagram_image')) {
            $img = request()->file('instagram_image');
            $fileName = $this->resizeImage($img,'instagram');
            $user->instagram_image = $fileName;
            $user->save();
        } else {
            $user->instagram_image = 'default.svg';
            $user->save();
        }

        if (request()->hasFile('snapchat_image')) {
            $img = request()->file('snapchat_image');
            $fileName = $this->resizeImage($img,'snapchat');
            $user->snapchat_image = $fileName;
            $user->save();
        } else {
            $user->snapchat_image = 'default.svg';
            $user->save();
        }

        if (request()->hasFile('pinterest_image')) {
            $img = request()->file('pinterest_image');
            $fileName = $this->resizeImage($img,'pinterest');
            $user->pinterest_image = $fileName;
            $user->save();
        } else {
            $user->pinterest_image = 'default.svg';
            $user->save();
        }

        if (request()->hasFile('tiktok_image')) {
            $img = request()->file('tiktok_image');
            $fileName = $this->resizeImage($img,'tiktok');
            $user->tiktok_image = $fileName;
            $user->save();
        } else {
            $user->tiktok_image = 'default.svg';
            $user->save();
        }
        $token = $user->createToken($this->clientToken())->accessToken;
        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 201);
    }
    public function resizeImage($image,$type)
    {
        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $upload = Image::make($image->getRealPath());
        $upload->resize(512, 512, function ($const) {
            $const->aspectRatio();
        });
        $upload->stream();
        Storage::disk('local')->put('public/'.$type.'/images/' . $fileName, $upload, 'public');
        return $fileName;
    }
}
