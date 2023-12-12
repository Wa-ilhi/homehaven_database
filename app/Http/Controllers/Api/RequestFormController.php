<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RequestForm;
use Illuminate\Http\Request;

class RequestFormController extends Controller
{
    public function index()
    {
        $requestForm = RequestForm::all();
        return $requestForm;
    }


    public function store(Request $request)
    {
        $request->validate([
            'property_type' => 'required',
            'house_type' => 'required',
            'user_id' => 'required',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',

        ]);

        RequestForm::create($request->all());

        return $request;
    }

    public function show(string $id)
    {
        $requestForm = RequestForm::findOrFail($id);
        return $requestForm;
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'property_type' => 'required',
            'house_type' => 'required',
            'user_id' => 'required',


        ]);

        $requestForm = RequestForm::findOrFail($id);
        $requestForm->update($request->all());

        return $requestForm;
    }

    public function destroy($id)
    {
        $requestForm = RequestForm::findOrFail($id);
        $requestForm->delete();

        return $requestForm;
    }
}
