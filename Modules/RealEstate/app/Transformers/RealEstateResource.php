<?php

namespace Modules\RealEstate\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RealEstateResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'publisher' => $this->publisher,
            'offer_type' => $this->offer_type,
            'main_address' => $this->main_address,
            'location' => [
                'lat' => $this->lat,
                'lan' => $this->lan,
            ],
            'price' => $this->price,
            'payment_type' => $this->payment_type,
            'rent_type' => $this->rent_type,
            'rate_allowed_for' => $this->rate_allowed_for,
            'city' => $this->city,
            'space' => $this->space,
            'brushes_status' => $this->brushes_status,
            'facade' => $this->facade,
            'type' => $this->type,
            'number_of_rooms' => $this->number_of_rooms,
            'number_of_bathrooms' => $this->number_of_bathrooms,
            'floor' => $this->floor,
            'description' => $this->description,
            'owner' => $this->whenLoaded('user', function () {
                return [
                    'id' => $this->user->id,
                    'name' => $this->user->first_name . ' ' . $this->user->last_name,
                    'email' => $this->user->email,
                    'phone' => $this->user->phone,
                ];
            }),
            'features' => $this->whenLoaded('features', function () {
                return $this->features->map(function ($feature) {
                    return [
                        'id' => $feature->id,
                        'name_ar' => $feature->name_ar,
                        'name_en' => $feature->name_en,
                        'type' => $feature->type,
                    ];
                });
            }),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
