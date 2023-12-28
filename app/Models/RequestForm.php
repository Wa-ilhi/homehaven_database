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
        'appointment_date',
        'appointment_time',
        'manager_response',
        'status'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'request_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
