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
            'content_category_id' => 'required'
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

        return redirect()->route('content', ['category' => $request->category_id])->with('success', "Berhasil menyimpan konten");
    }

    public function edit($id){
        $content = Content::findOrFail($id);
        $categories = ContentCategory::all();

        $indo = json_decode($content->content_indo);
        $arab = json_decode($content->content_arab);
        $latin = json_decode($content->content_latin);

        $contentResults = [];

        for($i = 0; $i < count($indo); $i++){
            $contentResults[] = [
                'indo' => $indo[$i],
                'arab' => $arab[$i],
                'latin' => $latin[$i],
            ];
        }
        
        return view('pages.content.edit', compact('content', 'categories', 'contentResults'));
    }

    public function update(Request $request, $id){
        
        $content = Content::findOrfail($id);
        $category_id = $request->category;

        $indo = [];
        $arab = [];
        $latin = [];
        for($i = 0; $i < count($request->content_indo); $i++){
            $number = $i+1;
            $indo[] = $request->content_indo[$i];
            $arab[] = $request->content_arab[$i];
            $latin[] = $request->content_latin[$i];
        }

        $content->update([
            'title_indo' => $request->title_indo,
            'title_arab' => $request->title_arab || null,
            'content_indo' => json_encode($indo),
            'content_arab' => json_encode($arab, JSON_UNESCAPED_UNICODE),
            'content_latin' => json_encode($latin),
            'content_category_id' => $request->content_category_id
        ]);

        return redirect()->route('content', ['category' => $request->category_id])->with('success', "Berhasil mengubah konten");
    }

    public function destroy(Request $request, $id){
        
        $content = Content::findOrFail($id);
        $content->delete();

        return redirect()->route('content', ['category' => $request->category_id])->with('success', "Berhasil menghapus konten");
    }

}
