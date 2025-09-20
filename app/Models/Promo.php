<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    //
    protected $table = 'promos';

    protected $fillable = [
        'start_date',
        'end_date',
        'discount',
    ];

    public $timestamps = false;

    public function transactionDetails() {
        return $this->hasMany(TransactionDetail::class, 'promo_id');
    }
}
