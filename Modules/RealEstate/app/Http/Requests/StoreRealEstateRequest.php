<?php

namespace Modules\RealEstate\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRealEstateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'publisher' => 'nullable|string|max:255',
            'offer_type' => 'required|string|in:rent,sale',
            'main_address' => 'nullable|string|max:255',
            'lat' => 'nullable|numeric|between:-90,90',
            'lan' => 'nullable|numeric|between:-180,180',
            'price' => 'required|numeric|min:0',
            'payment_type' => 'nullable|string|max:255',
            'rent_type' => 'nullable|string|max:255',
            'rate_allowed_for' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'space' => 'nullable|numeric|min:0',
            'brushes_status' => 'nullable|string|max:255',
            'facade' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'number_of_rooms' => 'nullable|integer|min:0',
            'number_of_bathrooms' => 'nullable|integer|min:0',
            'floor' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
        ];
    }
}
