<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    protected $table = 'transactionheaders';

    protected $fillable = [
        'transaction_date',
        'customer_id',
        'branch_id',
        'payment_id'
    ];

    public $timestamps = false;

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'header_id');
    }
}
