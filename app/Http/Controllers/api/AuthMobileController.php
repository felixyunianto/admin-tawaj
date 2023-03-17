<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\User;

class AuthMobileController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            $user['token'] = $user->createToken('nApp')->accessToken;

            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => $user
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Email atau Password Anda salah'
        ], 401);
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'nickname' => 'required',
            'whatsapp' => 'required',
        ]);

        if($validator->fails()){
            return repsonse()->json(["error" => $validator->errors()], 401);
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'nickname' => $request->nickname,
            'whatsapp' => $request->whatsapp,
        ]);

        $user['token'] = $user->createToken('nApp')->accessToken;

        if($user) {
            return response()->json([
                'status' => true,
                'message' => "Berhasil mendaftar",
                'data' => $user
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => "Gagal mendaftar",
            'data' => null
        ], 500);
    }
}
