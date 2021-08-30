<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
        request()->validate([
            'email' => 'required'
        ]);

        $user = User::where('email', request('email'))->first();

        if (!empty($user)) {
            $link = 'http://google.com/' . '?user_id=' . Crypt::encryptString($user->id);
            Mail::to($user->email)->send(new ForgotPassword($link, $user));
            return response()->json(['msg' => 'Please check your e-mail to change your password.'], 200);
        } else {
            return response()->json(['msg' => 'E-mail not found in the database.'], 200);
        }
    }
    
    public function changePassword()
    {
        request()->validate([
            'password' => 'required|confirmed'
        ]);

        $user = User::where('id', Crypt::decryptString(request('user_id')))->first();
        $user->password = request('password');
        $user->save();

        return response()->json(['msg' => 'Password Changed!'], 200);
    }
}
