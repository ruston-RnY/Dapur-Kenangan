<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class DetailController extends Controller
{
    public function index (Request $request, $slug)
    {
        $item = Product::with(['galleries'])
                ->where('slug', $slug)
                ->firstOrFail();
        return view('pages.detail', compact('item'));
    }
}
