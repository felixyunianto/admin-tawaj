<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ButtonPage;
use App\Models\BigButton;
use App\Models\BigTab;
use App\Models\Content;


class BigTabController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        $button_pages = ButtonPage::with('children.children')->whereNull('button_page_id')->get();
        $contents = Content::all();
        return view('pages.big_tabs.create', compact('contents', 'button_pages'));
    }

    public function store(Request $request){
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'link_type' => 'required', 
            'link' => 'required',
            'type_button' => 'required',
        ];

        $message = [
            'required' => 'Bidang ini tidak boleh kosong'
        ];

        $this->validate($request, $rules, $message);

        $imageName = "";

        if ($request->image) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/big-tabs'), $imageName);
        }

        BigTab::create([
            'title' => $request->title,
            'description' => $request->description,
            'link_type' => $request->link_type,
            'link' => $request->link,
            'type_button' => $request->type_button,
            'image' => url("/uploads/big-tabs/".$imageName)
        ]);

        return redirect()->route('home')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id){
        $big_tab = BigTab::findOrFail($id);
        $button_pages = ButtonPage::with('children.children')->whereNull('button_page_id')->get();
        $contents = Content::all();

        return view('pages.big_tabs.edit', compact('big_tab', 'contents', 'button_pages'));
    }

    public function update(Request $request, $id){
        $big_tab = BigTab::findOrFail($id);

        $image = $big_tab->image;
        $imageName = "";

        if($request->image){
            $imagePath = public_path('/uploads/big-tabs/');
            if($image){
                $imagePath = public_path('/uploads/big-tabs/') .explode("/", $image)[5];
            }
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/big-tabs'), $imageName);

            if(\File::exists($imagePath)){
                \File::delete($imagePath);
            }
        }

        $big_tab->update([
            'title' => $request->title,
            'description' => $request->description,
            'link_type' => $request->link_type,
            'link' => $request->link,
            'type_button' => $request->type_button,
            'image' => $request->image ? url("/uploads/big-tabs/".$imageName) : $big_tab->images
        ]);

        return redirect()->route('home')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id){
        $big_tab = BigTab::findOrFail($id);

        $image = $big_tab->image;

        if($image){
            $imagePath = public_path('/uploads/big-tabs/') .explode("/", $image)[5];

            if(\File::exists($imagePath)){
                \File::delete($imagePath);
            }
        }

        $big_tab->delete();

        return redirect()->route('home')->with('success', 'Data berhasil dihapus');
    }
}
