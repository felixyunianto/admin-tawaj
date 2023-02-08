<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Highlight;
use App\Models\ButtonPage;
use App\Models\Content;

class HighlightController extends Controller
{
    public function create(){
        $button_pages = ButtonPage::with('children.children')->whereNull('button_page_id')->get();
        $contents = Content::all();

        return view('pages.highlights.create', compact('contents', 'button_pages'));
    }

    public function store(Request $request){
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link_type' => 'required', 
            'link' => 'required', 
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/highlights'), $imageName);

        Highlight::create([
            'title' => $request->title,
            'description' => $request->description,
            'link_type' => $request->link_type,
            'link' => $request->link,
            'images' => url("/uploads/highlights/".$imageName)
        ]);

        return redirect()->route('home')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id){
        $highlights = Highlight::findOrFail($id);        
        return view('pages.highlights.create', compact('highlights'));
    }
}
