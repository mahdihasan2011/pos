<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'id',
        'name',
        'phone',
        'email',
        'category',
        'balance',
        'address'
    ];
}
