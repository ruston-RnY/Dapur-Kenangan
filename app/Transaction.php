<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'users_id', 'products_id', 'total_harga', 'transaction_status'
    ];

    public function detail(){
        return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }

    public function username(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
