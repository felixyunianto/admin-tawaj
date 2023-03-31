<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationMobileController extends Controller
{
    public function index() {
        $notifications = Notification::orderBy('created_at', "DESC")->take(10)->get();

        return response()->json([
            'message' => 'Successfully get notification',
            'error' => false,
            'data' => $notifications
        ]);
    }
}
