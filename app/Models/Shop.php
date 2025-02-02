<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    //
    use HasFactory;

    // public function promo(){
    //     return $this->hasMany(Promo::class);
    // }

    public function laundries(){
        return $this->hasMany(Laundry::class);
    }

    protected $fillable = [
        'image',
        'name',
        'location',
        'city',
        'delivery',
        'pickup',
        'whatsapp',
        'description',
        'price',
        'rate',
    ];
}
