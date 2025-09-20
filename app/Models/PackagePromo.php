<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackagePromo extends Model
{
    //
    protected $table = 'packages_promos';


    public $fillable = [
        'promo_id',
        'package_id'
    ];

    public $timestamps = false;

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
