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
        $laundries = Laundry::where('user_id','=',$id)->with('shop', 'user')->orderBy('created_at', 'desc')->get();

        if (count($laundries)>0){
            return response()->json([
                'data' => $laundries,
            ], 200);
        } else {
            return response()->json([
                'message' => 'not found',
                'data' => $laundries,
            ], 404);
        }
    }

    function claim(Request $request)
    {

        $laundry = Laundry::where([
            ['id', '=', $request->id],
            ['claim_code', '=', $request->claim_code],
        ]) ;

        if (!$laundry){
            return response()->json([
                'message' => 'not found',
            ], 404);
        }

        if ($laundry->user_id != null){
            return response()->json([
                'message' => 'already claimed',
            ], 400);
        }

        $laundry->user_id = $request->user_id;
        $Updated = $laundry->save();

        if ($Updated){
            return response()->json([
                'data' => $Updated,
            ], 200);
        } else {
            return response()->json([
                'message' => 'cannot be updated',
            ], 500);
        }
    }
}
