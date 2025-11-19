<?php

namespace Modules\RealEstate\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexRealEstateSaleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'per_page' => 'nullable|integer|min:1|max:100',
            'main_address' => 'nullable|string|max:255',
            'type' => 'nullable|in:' . implode(',', array_keys(config('real_estate.property_types'))),
            'price_min' => 'nullable|numeric|min:0',
            'price_max' => 'nullable|numeric|min:0',
            'space_min' => 'nullable|numeric|min:0',
            'space_max' => 'nullable|numeric|min:0',
            'number_of_rooms' => 'nullable|integer|min:0',
            'number_of_bathrooms' => 'nullable|integer|min:0',
            'brushes_status' => 'nullable|in:' . implode(',', array_keys(config('real_estate.furniture_status'))),
            'payment_type' => 'nullable|in:' . implode(',', array_keys(config('real_estate.payment_types'))),
            'city' => 'nullable|string|max:255',
            'lat' => 'nullable|numeric|between:-90,90',
            'lan' => 'nullable|numeric|between:-180,180',
        ];
    }
}
