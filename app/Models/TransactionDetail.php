<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = 'transactiondetails';

    public $fillable = [
        'header_id',
        'package_id',
        'product_id',
        'promo_id',
        'quantity',
        'price'
    ];

    public $timestamps = false;

    public function package() {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function promo() {
        return $this->belongsTo(Promo::class, 'promo_id'); 
    }
}
