<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $table = 'carts';

    public $fillable = [
        'customer_id',
        'package_id',
        'product_id',
        'quantity',
    ];

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
