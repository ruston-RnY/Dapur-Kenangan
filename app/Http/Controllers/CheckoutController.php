<?php

namespace App\Http\Controllers;

use App\Product;
use App\Transaction;
use App\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // public function index (Request $request, $id)
    // {
    //     $item = Transaction::with(['detail', 'product', 'username'])->findOrFail($id);

    //     return view('pages.checkout', compact('item'));
    // }
    public function index()
    {
        $item = Transaction::with(['detail', 'product', 'username'])->where('users_id', Auth::user()->id)->where('transaction_status', 0)->first();
        return view('pages.checkout', compact('item'));
    }

    public function process (Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $transaction_check = Transaction::where('users_id', Auth::user()->id)->where('transaction_status', 0)->first();
        
        if(empty($transaction_check))
        {
            $transaction = Transaction::create([
                'users_id' => Auth::user()->id,
                'products_id' => $id,
                'total_harga' => 0,
                'transaction_status' => 0
            ]);
        }
    
        $transaction = Transaction::where('users_id', Auth::user()->id)->where('transaction_status', 0)->first();

        $transaction_detail_check = TransactionDetail::where('transactions_id', $transaction->id)->first();

        if(empty($transaction_detail_check))
        {
            $transaction_detail = TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_name' => $product->name,
                'username' => Auth::user()->username,
                'jumlah_pesan' => $request->jumlah_pesan,
                'keterangan' => $request->keterangan,
                'jumlah_harga' => $product->price*$request->jumlah_pesan,
            ]);
        }else{
            $transaction_detail = TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_name' => $product->name,
                'username' => Auth::user()->username,
                'jumlah_pesan' => $request->jumlah_pesan,
                'keterangan' => $request->keterangan,
                'jumlah_harga' => $product->price*$request->jumlah_pesan,
            ]);
            $jumlah_harga_baru = $product->price*$request->jumlah_pesan;
            $transaction_detail->jumlah_harga = $transaction_detail->jumlah_harga+$jumlah_harga_baru;
        }
        $transaction->total_harga = $transaction->total_harga+$product->price*$request->jumlah_pesan;
        $transaction->update();
        

        return redirect()->route('checkout', $transaction->id);
    }

    public function checkout_cart(Request $request, $id)
    {
        $transaction = Transaction::where('users_id', Auth::user()->id)->where('transaction_status', 0)->first();
        if(!empty($transaction))
        {
            $transaction_detail = TransactionDetail::where('transactions_id', $transaction->id)->get();
        }

        return redirect()->route('checkout', $transaction->id);
    }

    public function remove($id)
    {

        $transaction_detail = TransactionDetail::findOrFail($id);
        $transaction = Transaction::where('users_id', Auth::user()->id)->where('id', $transaction_detail->transactions_id)->first();
        $transaction->total_harga = $transaction->total_harga-$transaction_detail->jumlah_harga;
        $transaction->update();
        $transaction_detail->delete();

        return redirect()->route('checkout', $transaction->id);
    }

    public function success(Request $request)
    {
        $transaction = Transaction::where('users_id', Auth::user()->id)->where('transaction_status', 0)->first();
        $transaction->transaction_status = 1;
        $transaction->save();

        return view('pages.success');
    }
    
}
