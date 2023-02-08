<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ButtonPage;

class ButtonPageMobileController extends Controller
{
    public function index(Request $request, $id) {
        // dd($request->all());
        $button_pages = ButtonPage::with('children.children')
        ->where('id', $id)->first();

        return response()->json([
            'data' => [$button_pages]
        ]);
    }
}
