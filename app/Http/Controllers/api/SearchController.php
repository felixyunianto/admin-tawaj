<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;

class SearchController extends Controller
{
    public function index(Request $request) {
        $contents = Content::where('title_arab', 'LIKE', "%{$request->search}%")->orWhere('title_indo', 'LIKE', "%{$request->search}%")->get();

        if($request->search === null){
            return response()->json([
                'message' => 'Successfully search',
                'error' => false,
                'data' => []
            ]);    
        }

        return response()->json([
            'message' => 'Successfully search',
            'error' => false,
            'data' => $contents
        ]);
    }
}
