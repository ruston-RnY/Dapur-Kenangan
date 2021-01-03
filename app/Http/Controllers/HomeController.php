<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $items = Product::with(['galleries'])->get();
        return view('pages.home', compact('items'));
    }
}
