<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RealEstateProperty;
use Illuminate\Http\Request;

class RealEstatePropertyController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'real_estate_id' => 'required|exists:real_estate,real_estate_id',
            'property_type' => 'required|string',
            'address' => 'required|string',
            'bedrooms' => 'required|integer',
            'status' => 'required|string',
            'bathrooms' => 'required|integer',
            'squarefootage' => 'required|integer',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'listing_price' => [
                'required',
                'numeric',
                'regex:/^\d+(\.\d{1,2})?$/',
            ],

        ]);


        $property = RealEstateProperty::create($request->all());

        return $property;
        //return response()->json(['property' => $property], 201);
    }

    public function show($id)
    {
        $realEstateProperty = RealEstateProperty::findOrFail($id);

        return $realEstateProperty;
        //return view('real_estate_property.show', compact('real_estate_properties'));
    }
}
