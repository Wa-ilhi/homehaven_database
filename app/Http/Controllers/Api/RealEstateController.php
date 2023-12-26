<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RealEstateRequest;
use App\Models\RealEstate;
use Illuminate\Http\Request;

class RealEstateController extends Controller
{
    public function store(RealEstateRequest $request)
    {

        $realEstate = RealEstate::create($request->all());

        return $realEstate;
    }

    public function show($id)
    {
        $realEstate = RealEstate::findOrFail($id);

        return $realEstate;
    }

    public function update(RealEstateRequest $request, $id)
    {


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
