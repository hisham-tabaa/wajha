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
        'publisher_type',
        'offer_type',
        'main_address',
        'lat',
        'lan',
        'price',
        'payment_type',
        'installment_years',
        'rent_type',
        'city',
        'brand',
        'model',
        'year',
        'color',
        'transmission',
        'fuel_type',
        'country_of_origin',
        'cylinder',
        'insurance',
        'engine_capacity',
        'power_horses',
        'mileage',
        'condition',
        'body_type',
        'number_of_seats',
        'number_of_doors',
        'description',
    ];
}
