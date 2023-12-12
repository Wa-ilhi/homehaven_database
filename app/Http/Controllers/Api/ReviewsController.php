<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'property_id' => 'required|exists:real_estate_properties,property_id',
            'comment' => 'required|nullable|string',

        ]);


        $review = Reviews::create($request->all());

        return $review;
    }

    public function show($id)
    {
        // Retrieve a review by ID
        $review = Reviews::findOrFail($id);

        return $review;
    }
}
