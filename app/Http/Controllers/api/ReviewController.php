<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function getReview(Request $req)
    {
        return response()->json([
            'status' => '200',
            'data' => Review::where('slug', $req->slug)->first()
        ]);
    }
    public function getNames()
    {
        return response()->json([
            'status' => '200',
            'data' => Review::select('slug', 'name', 'name_ru')->get()
        ]);
    }
}
