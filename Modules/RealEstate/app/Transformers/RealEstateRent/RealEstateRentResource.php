<?php

namespace Modules\RealEstate\Transformers\RealEstateRent;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class RealEstateRentResource extends JsonResource
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
            'rate_allowed_for'      => $this->rate_allowed_for,
            'city'                  => $this->city,
            'space'                 => $this->space,
            'brushes_status'        => $this->brushes_status,
            'facade'                => $this->facade,
            'type'                  => $this->type,
            'number_of_rooms'       => $this->number_of_rooms,
            'number_of_bathrooms'   => $this->number_of_bathrooms,
            'floor'                 => $this->floor,
            'description'           => $this->description,
            'created_at'            => $this->created_at,
            'updated_at'            => $this->updated_at,
        ];
    }
}
