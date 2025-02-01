<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promo extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'shop_id',
        'old_price',
        'new_price',
        'description',
    ];
}
