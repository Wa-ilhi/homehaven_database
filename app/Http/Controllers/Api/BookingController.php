<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
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

    public function store(BookingRequest $request)
    {

        $booking = Booking::create($request->all());

        return $booking;
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);

        return $booking;
    }



    public function update(BookingRequest $request, $id)
    {

        $booking = Booking::findOrFail($id);
        $booking->update($request->all());

        return $booking;
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return $booking;
    }
}
