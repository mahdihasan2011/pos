<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DiscountType extends Model
{
    protected $fillable = [
            'name',
            'ctype',
            'amount'
        ];
}
