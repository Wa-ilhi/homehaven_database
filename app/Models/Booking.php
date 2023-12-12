<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $primaryKey = 'booking_id';
    protected $table = 'bookings';
    protected $fillable = [
        'property_id',
        'request_id',
        'status'
    ];

    public function property()
    {
        return $this->belongsTo(RealEstateProperty::class, 'property_id');
    }

    public function request()
    {
        return $this->belongsTo(RequestForm::class, 'request_id');
    }

    // Add other relationships and methods as needed
}
