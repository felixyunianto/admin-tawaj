<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ButtonPage;
use App\Models\BigButton;
use App\Models\Content;

class BigButtonController extends Controller
{
    public function create(){
        $button_pages = ButtonPage::with('children.children')->whereNull('button_page_id')->get();
        $contents = Content::all();

        return view('pages.big_button.create', compact('contents', 'button_pages'));
    }

    public function store(Request $request){
        
        $request->validate([
            'title' => 'required',
            'link_type' => 'required', 
            'link' => 'required', 
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $buttonButtonActive = BigButton::where('is_showed', true)->count();

        if($request->is_showed === "on"){
            if($buttonButtonActive < 7){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/big-buttons'), $imageName);
        
                BigButton::create([
                    'title' => $request->title,
                    'link_type' => $request->link_type,
                    'link' => $request->link,
                    'image' => url("/uploads/big-buttons/".$imageName),
                    'is_showed' => 1
                ]);
        
                return redirect()->route('home')->with('success', 'Data berhasil disimpan');
            }else{
                return redirect()->back()->with('error', 'Button yang aktif sudah maksimal.');
            }
        }

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/big-buttons'), $imageName);

        BigButton::create([
            'title' => $request->title,
            'link_type' => $request->link_type,
            'link' => $request->link,
            'image' => url("/uploads/big-buttons/".$imageName),
        ]);

        return redirect()->route('home')->with('success', 'Data berhasil disimpan');
    }
}
