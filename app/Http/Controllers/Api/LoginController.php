<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $creds = $request->only(['email', 'password']);
        if(Auth::attempt($creds)){
            $info = Auth::user();
            $token = Hash::make($info);
            return response()->json(['user' => $info, 'token' => $token, 'message' => 'Success'], 200);
        }
        return response()->json(['message' => 'Fail'], 200);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
