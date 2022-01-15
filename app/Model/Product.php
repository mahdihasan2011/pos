<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
            'id',
            'name',
            'code',
            'category',
            'brand',
            'color',
            'size',
            'purchase_price',
            'cost',
            'profit',
            'sale_price',
            'image',
        ];
}
