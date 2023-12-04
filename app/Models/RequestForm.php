<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestForm extends Model
{


    protected $table = 'request_form';
    protected $primaryKey = 'request_id';
    protected $fillable = [
        'property_type',
        'house_type',
        'user_id',
        // 'date',
        // 'time'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'request_id');
    }

    // Add other relationships and methods as needed
}
