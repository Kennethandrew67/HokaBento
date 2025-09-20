<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageProduct extends Model
{
    //
    protected $table = 'packages_products';


    public $fillable = [
        'package_id',
        'product_id'
    ];

    public $timestamps = false;

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
