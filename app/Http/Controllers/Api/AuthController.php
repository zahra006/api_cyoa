<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request){
         $creds = $request->only(['email','password']);

         if (!$token=auth()->attempt($creds)) {
             return response()->json([
                 'success' => false,
                 'message' => 'Invalid credentials'
             ]);
         }

         return response()->json([
             'success' => true,
             'token' => $token,
             'user' => Auth::user()
         ]);
    }

    public function register(Request $request){
        $encryptedPass = Hash::make($request -> password);

        $user = new User();

        try {
            $user->email = $request->email;
            $user->password = $encryptedPass;
            $user->save();
            return $this->login($request);
        } catch (Exception $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ]);
        }
    }

    public function logout(Request $request){
        try {
            JWTAuth::invalidate(JWTAuth::parseToken($request->token));
            return response()->json([
                'success' => true,
                'message' => 'logout success'
            ]);
        } catch (Exception $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ]);
        }
    }
}
