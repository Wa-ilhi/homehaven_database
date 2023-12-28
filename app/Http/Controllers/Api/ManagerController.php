<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RequestForm;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function getRequestsForManager()
    {
        // Retrieve all request forms
        $requests = RequestForm::all();

        // You can modify the query as needed, e.g., filtering, pagination, etc.

        return $requests;
    }

    public function receiveRequest(Request $request)
    {
        // Validate the incoming request data if needed

        // Process the received request and store it in the database
        $newRequest = RequestForm::create([
            'property_type' => $request->input('property_type'),
            'house_type' => $request->input('house_type'),
            'user_id' => $request->input('user_id'),
            'appointment_date' => $request->input('appointment_date'),
            'appointment_time' => $request->input('appointment_time'),


        ]);



        return $newRequest;
    }
}
