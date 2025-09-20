<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    //
    protected $table = 'users';


    public $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'role',
        'staff_branch_id'
    ];

    public $timestamps = false;
    protected $hidden = 'password';
}
