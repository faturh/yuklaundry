<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laundry extends Model
{
    //
    use HasFactory;
    protected $fillable=[

    'claim_code',
    'user_id',
    'shop_id',
    'weight',
    'with_pickup',
    'with_delivery',
    'pickup_address',
    'delivery_address',
    'total',
    'description',
    'status'

    ];

}
