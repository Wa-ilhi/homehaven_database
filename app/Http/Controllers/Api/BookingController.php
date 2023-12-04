<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\RealEstateProperty;
use App\Models\RequestForm;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return $bookings;
    }

    public function create()
    {
        $properties = RealEstateProperty::all();
        $requests = RequestForm::all();
        return view('bookings.create', compact('properties', 'requests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:real_estate_properties,property_id',
            'request_id' => 'required|exists:request_form,request_id',
            'status' => 'required',
        ]);

        Booking::create($request->all());

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully');
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('bookings.show', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $properties = RealEstateProperty::all();
        $requests = RequestForm::all();
        return view('bookings.edit', compact('booking', 'properties', 'requests'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'property_id' => 'required|exists:real_estate_properties,property_id',
            'request_id' => 'required|exists:request_forms,request_id',
            'status' => 'required',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update($request->all());

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully');
    }
}
