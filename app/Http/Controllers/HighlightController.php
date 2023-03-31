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
            'images' => "/uploads/highlights/".$imageName
        ]);

        return redirect()->route('home')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id){
        $highlight = Highlight::findOrFail($id);

        $button_pages = ButtonPage::with('children.children')->whereNull('button_page_id')->get();
        $contents = Content::all();

        return view('pages.highlights.edit', compact('highlight', 'button_pages', 'contents'));
    }

    public function update(Request $request, $id){
        $highlight = Highlight::findOrFail($id);
        $image = $highlight->images;
        $imagePath = public_path('/uploads/highlights/') .explode("/", $image)[3];
        $imageName = "";

        if($request->image){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/highlights'), $imageName);

            if(\File::exists($imagePath)){
                \File::delete($imagePath);
            }
        }

        $highlight->update([
            'title' => $request->title,
            'description' => $request->description,
            'link_type' => $request->link_type,
            'link' => $request->link,
            'images' => $request->image ? "/uploads/highlights/".$imageName : $highlight->images
        ]);

        return redirect()->route('home')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id) {
        $highlight = Highlight::findOrFail($id);
        $image = $highlight->images;
        if($image){
            $imagePath = public_path('/uploads/highlights/') .explode("/", $image)[3];

            if(\File::exists($imagePath)){
                \File::delete($imagePath);
            }
        }

        $highlight->delete();

        return redirect()->route('home')->with('success', 'Data berhasil dihapus');
    }
}
