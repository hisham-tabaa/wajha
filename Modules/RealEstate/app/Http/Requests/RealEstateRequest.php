<?php

namespace Modules\RealEstate\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RealEstateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'publisher' => 'required|string|in:owner,office',
            'offer_type' => 'required|string|in:sale,rent,purchase',
            'main_address' => 'required|string|max:500',
            'lat' => 'required|numeric|between:-90,90',
            'lan' => 'required|numeric|between:-180,180',
            'price' => 'required|numeric|min:0',
            'city' => 'required|string|max:100',
            'space' => 'required|numeric|min:0',
            'type' => 'required|string|in:residential,commercial,land,multi_blocks',
            'number_of_rooms' => 'integer|min:0',
            'number_of_bathrooms' => 'integer|min:0',
            'floor' => 'integer|min:0',
            'description' => 'nullable|string',
            'features' => 'array',
            'features.*' => 'exists:features,id',
        ];

        // قواعد خاصة بنوع العرض
        if ($this->offer_type === 'rent') {
            $rules['rent_type'] = 'required|string|in:weekly,monthly,yearly';
            $rules['rate_allowed_for'] = 'required|string|in:males,females,families';
        }

        if ($this->offer_type === 'sale') {
            $rules['payment_type'] = 'required|string|in:cash,installment';
        }

        if (in_array($this->type, ['residential', 'commercial'])) {
            $rules['brushes_status'] = 'required|string|in:fully_furnished,unfurnished,partially_furnished';
            $rules['facade'] = 'required|string|in:north,south,east,west,north_east,north_west,south_east,south_west';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'publisher.required' => 'نوع الناشر مطلوب',
            'offer_type.required' => 'نوع العرض مطلوب',
            'main_address.required' => 'العنوان الرئيسي مطلوب',
            'lat.required' => 'خط العرض مطلوب',
            'lan.required' => 'خط الطول مطلوب',
            'price.required' => 'السعر مطلوب',
            'city.required' => 'المدينة مطلوبة',
            'space.required' => 'المساحة مطلوبة',
            'type.required' => 'نوع العقار مطلوب',
        ];
    }
}
