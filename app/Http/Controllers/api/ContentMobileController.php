<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;

class ContentMobileController extends Controller
{
    public function index($id) {
        $content = Content::findOrFail($id);

        $data = [
            'title_indo' => $content->title_indo,
            'title_arab' => $content->title_arab,
            'content_indo' => json_decode($content->content_indo),
            'content_arab' => json_decode($content->content_arab),
            'content_latin' => json_decode($content->content_latin),
        ];

        return response()->json([
            'data' => $data
        ]);
    }
}
