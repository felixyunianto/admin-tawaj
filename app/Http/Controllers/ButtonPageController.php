<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ButtonPage;
use App\Models\Content;

class ButtonPageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index () {
        $button_pages = ButtonPage::with('parent')->get();

        return view('pages.button_page.index', compact('button_pages'));
    }

    public function create() {
        $contents = Content::all();
        $button_pages = Content::all();

        return view('pages.button_page.create', compact('contents', 'button_pages'));
    }

    public function store(Request $request){
        $rules = [
            'title' => 'required',
            'title2' => 'required',
            'deskripsi' => 'required',
        ];
        
        $message = [
            'required' => 'Form ini harus diisi'
        ];

        $this->validate($request, $rules, $message);

        ButtonPage::create([
            'title' => $request->title,
            'title2' => $request->title2,
            'deskripsi' => $request->deskripsi,
            'link_type' => $request->link_type,
            'link' => $request->link,
            'button_page_id' => $request->button_page_id ? $request->button_page_id : null
        ]);

        return redirect()->route('button_page.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id){
        $button_page = ButtonPage::findOrFail($id);

        $contents = Content::all();
        $button_pages = ButtonPage::all();

        return view('pages.button_page.edit', compact('button_page', 'button_pages', 'contents'));
    }

    public function update(Request $request, $id){
        $button_pages = ButtonPage::findOrFail($id);


        $button_pages->update([
            'title' => $request->title,
            'title2' => $request->title2,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link,
            'button_page_id' => $request->button_page_id ? $request->button_page_id : null,
            'link_type' => $request->link_type,
        ]);

        return redirect()->route('button_page.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id){
        $button_pages = ButtonPage::findOrFail($id);
        
        $haveAChild = ButtonPage::where('button_page_id', $id)->get();
        if(count($haveAChild) > 0){
            return redirect()->route('button_page.index')->with('error', 'Data tidak bisa dihapus karena sedang digunakan');    
        }

        $button_pages->delete();

        return redirect()->route('button_page.index')->with('success', 'Data berhasil dihapus');
    }
}
