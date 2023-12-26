<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function store(Request $request)
    {

        $review = Reviews::create($request->all());

        return $review;
    }

    public function show($id)
    {

        $review = Reviews::findOrFail($id);

        return $review;
    }
}
