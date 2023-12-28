<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestFormRequest;
use App\Models\RequestForm;
use Illuminate\Http\Request;

class RequestFormController extends Controller
{
    public function index()
    {
        $requestForm = RequestForm::with('user')->get();
        return $requestForm;
    }


    public function store(RequestFormRequest $request)
    {

        // Get the authenticated user
        $user = auth()->user();

        // Create the request form with the user association
        $requestForm = new RequestForm($request->all());
        $requestForm->user()->associate($user);
        $requestForm->save();

        return $requestForm;
    }

    public function show(string $id)
    {
        $requestForm = RequestForm::findOrFail($id);
        return $requestForm;
    }


    public function update(Request $request, $id)
    {

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
