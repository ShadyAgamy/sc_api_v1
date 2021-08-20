<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $creds = User::where('email', request('email'))->first();
        if (!empty($creds) && Hash::check(request('password'), $creds->password)) {
            $token = $creds->createToken($this->clientToken())->accessToken;
            return response()->json([
                'user' => $creds,
                'token' => $token,
            ], 201);
        } else {
            return response()->json(['msg' => 'These credentials does not belong to any of our database.'], 404);
        }
    }
}
