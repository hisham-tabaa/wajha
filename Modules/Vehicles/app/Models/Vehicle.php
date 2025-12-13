<?php

namespace Modules\Vehicles\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'publisher',
        'offer_type',
        'main_address',
        'lat',
        'lan',
        'price',
        'payment_type',
        'rent_type',
        'city',
        'brand',
        'model',
        'year',
        'color',
        'transmission',
        'fuel_type',
        'mileage',
        'condition',
        'body_type',
        'number_of_seats',
        'number_of_doors',
        'description',
    ];
}
