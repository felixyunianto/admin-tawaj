<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sort;

class HomeMobileController extends Controller
{
    public function index() {
        $sorts = Sort::orderBy('order', 'ASC')->get();

        return response()->json([
            'message' => 'Successfully get sorts',
            'error' => false,
            'data' => $sorts
        ]);
    }
}
