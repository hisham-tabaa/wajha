<?php

namespace Modules\Vehicles\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'publisher' => $this->publisher,
            'publisher_type' => $this->publisher_type,
            'offer_type' => $this->offer_type,
            'main_address' => $this->main_address,
            'lat' => $this->lat,
            'lan' => $this->lan,
            'price' => $this->price,
            'payment_type' => $this->payment_type,
            'installment_years' => $this->installment_years,
            'rent_type' => $this->rent_type,
            'city' => $this->city,
            'brand' => $this->brand,
            'model' => $this->model,
            'year' => $this->year,
            'color' => $this->color,
            'transmission' => $this->transmission,
            'fuel_type' => $this->fuel_type,
            'country_of_origin' => $this->country_of_origin,
            'cylinder' => $this->cylinder,
            'insurance' => $this->insurance,
            'engine_capacity' => $this->engine_capacity,
            'power_horses' => $this->power_horses,
            'mileage' => $this->mileage,
            'condition' => $this->condition,
            'body_type' => $this->body_type,
            'number_of_seats' => $this->number_of_seats,
            'number_of_doors' => $this->number_of_doors,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
