<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Highlight;

class HighlightMobileController extends Controller
{
    public function index(){
        $highlights = Highlight::all();

        return response()->json([
            'data' => $highlights
        ]);
    }
}
