<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\ContentCategory;

class ContentController extends Controller
{
    public function __contruct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
        $category_id = $request->category;
        
        $contents = Content::where('content_category_id', $category_id)->get();

        return view('pages.content.index', compact('contents'));
    }

    public function create(){
        $categories = ContentCategory::all();
        return view('pages.content.create', compact('categories'));
    }

    public function store(Request $request) {
        $rules = [
            'title_indo' => 'required',
            'title_arab' => 'required',
        ];
        $message = [
            'required' => 'form ini harus diisi'
        ];

        $this->validate($request, $rules, $message);

        $indo = [];
        $arab = [];
        $latin = [];
        for($i = 0; $i < count($request->content_indo); $i++){
            $number = $i+1;
            $indo[] = $request->content_indo[$i];
            $arab[] = $request->content_arab[$i];
            $latin[] = $request->content_latin[$i];
        }

        Content::create([
            'title_indo' => $request->title_indo,
            'title_arab' => $request->title_arab,
            'content_indo' => json_encode($indo),
            'content_arab' => json_encode($arab, JSON_UNESCAPED_UNICODE),
            'content_latin' => json_encode($latin),
            'content_category_id' => $request->content_category_id
        ]);

        return redirect()->route('content', ['category' => $request->category_id])->with('succes', "Berhasil menyimpan konten");
    }

}
