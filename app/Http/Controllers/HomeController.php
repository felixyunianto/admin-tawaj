<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Highlight;
use App\Models\BigButton;
use App\Models\BigTab;

use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $highlights = Highlight::all();
        $big_buttons = BigButton::all();
        $big_tabs = BigTab::all();
        

        return view('home', compact('highlights', 'big_buttons', 'big_tabs'));
    }
}
