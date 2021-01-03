<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'name', 'slug', 'about', 'price',
    ];

    public function galleries(){
        return $this->hasMany(Gallery::class, 'products_id', 'id');
    } 
}
