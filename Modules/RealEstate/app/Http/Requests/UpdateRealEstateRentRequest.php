<?php

namespace Modules\RealEstate\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRealEstateRentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'publisher' => 'nullable|in:' . implode(',', array_keys(config('real_estate.publishers'))),
            'main_address' => 'nullable|string|max:255',
            'lat' => 'nullable|numeric|between:-90,90',
            'lan' => 'nullable|numeric|between:-180,180',
            'type' => 'nullable|in:' . implode(',', array_keys(config('real_estate.property_types'))),
            'price' => 'nullable|numeric|min:0',
            'price_min' => 'nullable|numeric|min:0',
            'price_max' => 'nullable|numeric|min:0',
            'payment_type' => 'nullable|in:' . implode(',', array_keys(config('real_estate.payment_types'))),
            'rent_type' => 'nullable|in:' . implode(',', array_keys(config('real_estate.rent_types'))),
            'rate_allowed_for' => 'nullable|in:' . implode(',', array_keys(config('real_estate.allowed_for'))),
            'city' => 'nullable|string|max:255',
            'space' => 'nullable|numeric|min:0',
            'brushes_status' => 'nullable|in:' . implode(',', array_keys(config('real_estate.furniture_status'))),
            'facade' => 'nullable|in:' . implode(',', array_keys(config('real_estate.facades'))),
            'number_of_rooms' => 'nullable|integer|min:0',
            'number_of_bathrooms' => 'nullable|integer|min:0',
            'floor' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
        ];
    }
}
