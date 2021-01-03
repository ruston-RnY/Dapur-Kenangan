<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Transaction;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.dashboard',[
            'products' => Product::count(),
            'transactions' => Transaction::count(),
            'transactions_success' => Transaction::where('transaction_status', 'SUCCESS')->count(),
            'transactions_pending' => Transaction::where('transaction_status', 'PENDING')->count(),
        ]);
    }
}
