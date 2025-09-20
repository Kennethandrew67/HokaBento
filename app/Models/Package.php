<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
    protected $table = 'packages';

    public $fillable = [
        'package_name',
        'package_price',
        'package_image'
    ];

    public function promos()
    {
        return $this->belongsToMany(Promo::class, 'packages_promos', 'package_id', 'promo_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'packages_products', 'package_id', 'product_id');
    }
}
