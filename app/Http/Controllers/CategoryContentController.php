<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentCategory;

class CategoryContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $categories = ContentCategory::all();
        return view('pages.content_category.index', compact('categories'));
    }

    public function create(){
        return view('pages.content_category.create');
    }

    public function store(Request $request){
        $rules = [
            'content_category_name' => 'required'
        ];

        $messages = [
            'required' => 'Form ini tidak boleh kosong'
        ];

        $this->validate($request, $rules, $messages);

        ContentCategory::create([
            'content_category_name' => $request->content_category_name
        ]);

        return redirect()->route('content-category')->with('success', "Data berhasil disimpan");
    }

    public function edit($id){
        $category = ContentCategory::findOrFail($id);

        return view('pages.content_category.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $category = ContentCategory::findOrFail($id);

        $category->update([
            'content_category_name' => $request->content_category_name
        ]);

        return redirect()->route('content-category')->with('success', "Data berhasil diubah");
    }

    public function destroy($id){
        $category = ContentCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('content-category')->with('success', "Data berhasil dihapus");
    }
}
