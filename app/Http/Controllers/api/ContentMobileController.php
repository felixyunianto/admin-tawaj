<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;

class ContentMobileController extends Controller
{
    public function index($id) {
        $content = Content::findOrFail($id);

        $indo = json_decode($content->content_indo);
        $arab = json_decode($content->content_arab);
        $latin = json_decode($content->content_latin);

        $contentResults = [

        ];

        for($i = 0; $i < count($indo); $i++){
            $contentResults[] = [
                'indo' => $indo[$i],
                'arab' => $arab[$i],
                'latin' => $latin[$i],
            ];
        }

        $data = [
            'title_indo' => $content->title_indo,
            'title_arab' => $content->title_arab,
            'content' => $contentResults,
        ];

        return response()->json([
            'data' => $data
        ]);
    }
}
