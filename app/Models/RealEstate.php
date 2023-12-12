<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstate extends Model
{
    use HasFactory;

    protected $primaryKey = 'real_estate_id';
    protected $table = 'real_estate';

    protected $fillable = [
        'type',
        'city',
        'zipcode',
        'property_id',

    ];

    public function realEstateProperties()
    {
        return $this->hasMany(RealEstateProperty::class, 'real_estate_id');
    }
}
