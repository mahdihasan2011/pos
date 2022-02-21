<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'purchase_code_initial',
        'sale_code_initial',
        'item_code_initial',
        'purchase_terminal',
        'sale_terminal',
        'menu_position',
        'brand_logo_variant',
        'navbar_variant',
        'sidebar_variant',
        'flat_sidebar',
        'sidebar_child_menu',
        'vat_percentage',
    ];

}
