<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstateProperty extends Model
{
    use HasFactory;

    protected $primaryKey = 'property_id';
    protected $table = 'real_estate_properties';
    protected $fillable = [
        'property_type',
        'address',
        'bedrooms',
        'bathrooms',
        'squarefootage',
        'listing_price',
        'status',
        'real_estate_id',
        'image',
    ];

    public function realEstate()
    {
        return $this->belongsTo(RealEstate::class, 'real_estate_id');
    }
}
