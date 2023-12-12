<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RealEstate;
use Illuminate\Http\Request;

class RealEstateController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'type' => 'required|string',
            'property_id' => 'required|exists:real_estate_properties,property_id',
            'city' => 'required|string',
            'zipcode' => 'required|string',
        ]);


        $realEstate = RealEstate::create($request->all());

        return $realEstate;

        //return response()->json(['real_estate' => $realEstate], 201);
    }

    public function show($id)
    {
        $realEstate = RealEstate::findOrFail($id);

        return $realEstate;

        //return view('real_estate.show', compact('real_estate'));
    }
}
