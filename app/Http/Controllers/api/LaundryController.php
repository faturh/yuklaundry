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

    function whereUserId($id)
    {
        $laundrys = Laundry::where('user_id','=',$id)->with('shop', 'user')->orderBy('created_at', 'desc')->get();

        if (count($laundrys)>0){
            return response()->json([
                'data' => $laundrys,
            ], 200);
        } else {
            return response()->json([
                'message' => 'not found',
                'data' => $laundrys,
            ], 404);
        }
    }
}
