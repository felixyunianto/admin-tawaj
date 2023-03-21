<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api');
    }
    public function index($id) {
        $user = User::findOrFail($id);
        return response()->json([
            'message' => 'Successfully to change profile',
            'error' => false,
            'data' => $user
        ]);
    }
    public function editProfile(Request $request, $id) {
        $user = User::findOrFail($id);
        
        $user->update([
            'name' => $request->name,
            'whatsapp' => $request->whatsapp,
            'password' => $request->password ? bcrypt($request->password) : $user->password
        ]);

        return response()->json([
            'message' => 'Successfully to change profile',
            'error' => false,
            'data' => $user
        ]);
    }
}
