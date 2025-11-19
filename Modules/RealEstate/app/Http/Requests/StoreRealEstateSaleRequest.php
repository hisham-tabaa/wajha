<?php

namespace Modules\RealEstate\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRealEstateSaleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'publisher' => 'nullable|in:' . implode(',', array_keys(config('real_estate.publishers'))),
            'main_address' => 'required|string|max:255',
            'lat' => 'nullable|numeric|between:-90,90',
            'lan' => 'nullable|numeric|between:-180,180',
            'type' => 'required|in:' . implode(',', array_keys(config('real_estate.property_types'))),
            'price' => 'required|numeric|min:0',
            'price_min' => 'nullable|numeric|min:0',
            'price_max' => 'nullable|numeric|min:0',
            'payment_type' => 'required|in:' . implode(',', array_keys(config('real_estate.payment_types'))),
            'city' => 'nullable|string|max:255',
            'space' => 'required|numeric|min:0',
            'brushes_status' => 'required|in:' . implode(',', array_keys(config('real_estate.furniture_status'))),
            'facade' => 'required|in:' . implode(',', array_keys(config('real_estate.facades'))),
            'number_of_rooms' => 'required|integer|min:0',
            'number_of_bathrooms' => 'required|integer|min:0',
            'floor' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
        ];
    }
}
