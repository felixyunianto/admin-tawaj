<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sort;
use App\Models\Highlight;
use App\Models\BigButton;
use App\Models\BigTab;

class HomeMobileController extends Controller
{
    public function index() {
        $sorts = Sort::orderBy('order', 'ASC')->get();

        return response()->json([
            'message' => 'Successfully get sorts',
            'error' => false,
            'data' => $sorts
        ]);
    }

    public function highlight() {
        $highlights = Highlight::orderBy("created_at", "DESC")->take(5)->get();

        return response()->json([
            'data' => $highlights
        ]);
    }

    public function bigButton() {
        $big_buttons = BigButton::where('is_showed', 1)->orderBy("created_at", "DESC")->get();

        return response()->json([
            'data' => $big_buttons
        ]);
    }

    public function allBigButton() {
        $big_buttons = BigButton::orderBy("created_at", "DESC")->get();

        return response()->json([
            'data' => $big_buttons
        ]);
    }

    public function bigTab() {
        $big_tabs = BigTab::orderBy('created_at', 'DESC')->take(5)->get();

        return response()->json([
            'data' => $big_tabs
        ]);
    }
}
