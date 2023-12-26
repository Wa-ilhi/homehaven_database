<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RealEstateProperty;
use Illuminate\Http\Request;

class RealEstatePropertyController extends Controller
{
    public function store(Request $request)
    {

        $property = RealEstateProperty::create($request->all());

        return $property;
    }

    public function show($id)
    {
        $realEstateProperty = RealEstateProperty::findOrFail($id);

        return $realEstateProperty;
    }

    public function index(Request $request)
    {
        $query = RealEstateProperty::query();


        if ($request->keyword) {
            $query->where(function ($query) use ($request) {
                $query->where('property_type', 'like', '%' . $request->input('keyword') . '%')
                    ->orWhere('address', 'like', '%' . $request->input('keyword') . '%');
            });
        }

        $results = $query->get();

        return $results;
    }

    public function update(Request $request, $id)
    {

        $realEstateProperty = RealEstateProperty::findOrFail($id);

        $realEstateProperty->update($request->all());

        return $realEstateProperty;
    }

    public function destroy($id)
    {
        $realEstateProperty = RealEstateProperty::findOrFail($id);
        $realEstateProperty->delete();

        return $realEstateProperty;
    }
}
