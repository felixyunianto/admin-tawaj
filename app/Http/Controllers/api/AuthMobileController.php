<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\User;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;

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
            $token = $user->createToken('nApp');
            $strToken = $token->accessToken;
            $expiration = $token->token->expires_at;

            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => [
                    'user' => $user,
                    'token' => [
                        'token' => $strToken,
                        'expired_at' =>  $expiration   
                    ]
                ]
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
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'nickname' => 'required',
            'whatsapp' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(["error" => $validator->errors()], 403);
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

    public function logout(){
        if(Auth::check()){
            Auth::user()->token()->revoke();
            return response()->json(['success' =>'logout_success'],200); 
        }else{
            return response()->json(['error' =>'api.something_went_wrong'], 500);
        }
        // $user = Auth::user();

        // $tokens =  $user->token->pluck('id');
        // Token::whereIn('id', $tokens)
        //     ->update(['revoked'=> true]);

        // RefreshToken::whereIn('access_token_id', $tokens)->update(['revoked' => true]); 

        // return response()->json('Successfully logged out');
    }
}
