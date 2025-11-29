<?php

namespace Modules\RealEstate\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexRealEstateRentRequest extends FormRequest
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
            'type' => 'nullable|in:values:config(real_estate.property_types)',
            'price_min' => 'nullable|numeric|min:0',
            'price_max' => 'nullable|numeric|min:0',
            'space_min' => 'nullable|numeric|min:0',
            'space_max' => 'nullable|numeric|min:0',
            'number_of_rooms' => 'nullable|integer|min:0',
            'number_of_bathrooms' => 'nullable|integer|min:0',
            'brushes_status' => 'nullable|in:values:config(real_estate.furniture_status)',
            'payment_type' => 'nullable|in:values:config(real_estate.payment_types)',
            'rent_type' => 'nullable|in:values:config(real_estate.rent_types)',
            'rate_allowed_for' => 'nullable|in:values:config(real_estate.allowed_for)',
            'city' => 'nullable|string|max:255',
            'lat' => 'nullable|numeric|between:-90,90',
            'lan' => 'nullable|numeric|between:-180,180',
        ];
    }

    public function messages(): array
    {
        return [
            'per_page.integer' => 'عدد العناصر يجب أن يكون رقماً صحيحاً',
            'per_page.min' => 'عدد العناصر يجب أن يكون أكبر من 0',
            'per_page.max' => 'عدد العناصر يجب أن لا يتجاوز 100',
            'main_address.string' => 'العنوان الرئيسي يجب أن يكون نصاً',
            'main_address.max' => 'العنوان الرئيسي يجب أن لا يتجاوز 255 حرف',
            'type.in' => 'نوع العقار غير صحيح',
            'price_min.numeric' => 'الحد الأدنى للسعر يجب أن يكون رقماً',
            'price_min.min' => 'الحد الأدنى للسعر يجب أن يكون 0 أو أكثر',
            'price_max.numeric' => 'الحد الأقصى للسعر يجب أن يكون رقماً',
            'price_max.min' => 'الحد الأقصى للسعر يجب أن يكون 0 أو أكثر',
            'space_min.numeric' => 'الحد الأدنى للمساحة يجب أن يكون رقماً',
            'space_min.min' => 'الحد الأدنى للمساحة يجب أن يكون 0 أو أكثر',
            'space_max.numeric' => 'الحد الأقصى للمساحة يجب أن يكون رقماً',
            'space_max.min' => 'الحد الأقصى للمساحة يجب أن يكون 0 أو أكثر',
            'number_of_rooms.integer' => 'عدد الغرف يجب أن يكون رقماً صحيحاً',
            'number_of_rooms.min' => 'عدد الغرف يجب أن يكون 0 أو أكثر',
            'number_of_bathrooms.integer' => 'عدد الحمامات يجب أن يكون رقماً صحيحاً',
            'number_of_bathrooms.min' => 'عدد الحمامات يجب أن يكون 0 أو أكثر',
            'brushes_status.in' => 'حالة الأثاث غير صحيحة',
            'payment_type.in' => 'نوع الدفع غير صحيح',
            'rent_type.in' => 'نوع الإيجار غير صحيح',
            'rate_allowed_for.in' => 'الفئة المسموحة غير صحيحة',
            'city.string' => 'المدينة يجب أن تكون نصاً',
            'city.max' => 'المدينة يجب أن لا تتجاوز 255 حرف',
            'lat.numeric' => 'خط العرض يجب أن يكون رقماً',
            'lat.between' => 'خط العرض يجب أن يكون بين -90 و 90',
            'lan.numeric' => 'خط الطول يجب أن يكون رقماً',
            'lan.between' => 'خط الطول يجب أن يكون بين -180 و 180',
        ];
    }
}
