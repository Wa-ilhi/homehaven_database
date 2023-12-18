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
    }

    public function show($id)
    {
        $realEstate = RealEstate::findOrFail($id);

        return $realEstate;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'string',
            'property_id' => 'exists:real_estate_properties,property_id',
            'city' => 'string',
            'zipcode' => 'string',
        ]);

        $realEstate = RealEstate::findOrFail($id);

        $realEstate->update($request->all());

        return $realEstate;
    }

    public function destroy($id)
    {
        $realEstate = RealEstate::findOrFail($id);
        $realEstate->delete();

        return $realEstate;
    }
}
