<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    public $fillable = [
        'product_name',
        'product_type',
        'product_point',
        'product_price',
        'product_image'
    ];
}
