<?php

namespace Modules\Vehicles\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class VehicleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'                    => $this->id,
            'user_id'               => $this->user_id,
            'publisher'             => $this->publisher,
            'offer_type'            => $this->offer_type,
            'main_address'          => $this->main_address,
            'lat'                   => $this->lat,
            'lan'                   => $this->lan,
            'price'                 => $this->price,
            'payment_type'          => $this->payment_type,
            'rent_type'             => $this->rent_type,
            'city'                  => $this->city,
            'brand'                 => $this->brand,
            'model'                 => $this->model,
            'year'                  => $this->year,
            'color'                 => $this->color,
            'transmission'          => $this->transmission,
            'fuel_type'             => $this->fuel_type,
            'mileage'               => $this->mileage,
            'condition'             => $this->condition,
            'body_type'             => $this->body_type,
            'number_of_seats'       => $this->number_of_seats,
            'number_of_doors'       => $this->number_of_doors,
            'description'           => $this->description,
            'created_at'            => $this->created_at,
            'updated_at'            => $this->updated_at,
        ];
    }
}
