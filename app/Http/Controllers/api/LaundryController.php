<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Laundry;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
    //
    function readAll()
    {
        $laundrys = Laundry::with('user', 'shop')->get();

        return response()->json([
            'data' => $laundrys,
        ], 200);
    }
}
