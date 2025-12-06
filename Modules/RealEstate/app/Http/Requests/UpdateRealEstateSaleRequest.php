<?php

namespace Modules\RealEstate\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRealEstateSaleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'publisher' => 'nullable|in:values:config(real_estate.publishers)',
            'main_address' => 'nullable|string|max:255',
            'lat' => 'nullable|numeric|between:-90,90',
            'lan' => 'nullable|numeric|between:-180,180',
            'type' => 'nullable|in:values:config(real_estate.property_types)',
            'price' => 'nullable|numeric|min:0',
            'price_min' => 'nullable|numeric|min:0',
            'price_max' => 'nullable|numeric|min:0',
            'payment_type' => 'nullable|in:values:config(real_estate.payment_types)',
            'city' => 'nullable|string|max:255',
            'space' => 'nullable|numeric|min:0',
            'brushes_status' => 'nullable|in:values:config(real_estate.furniture_status)',
            'facade' => 'nullable|in:values:config(real_estate.facades)',
            'number_of_rooms' => 'nullable|integer|min:0',
            'number_of_bathrooms' => 'nullable|integer|min:0',
            'floor' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'publisher.in' => 'الناشر غير صحيح',
            'main_address.string' => 'العنوان الرئيسي يجب أن يكون نصاً',
            'main_address.max' => 'العنوان الرئيسي يجب أن لا يتجاوز 255 حرف',
            'lat.numeric' => 'خط العرض يجب أن يكون رقماً',
            'lat.between' => 'خط العرض يجب أن يكون بين -90 و 90',
            'lan.numeric' => 'خط الطول يجب أن يكون رقماً',
            'lan.between' => 'خط الطول يجب أن يكون بين -180 و 180',
            'type.in' => 'نوع العقار غير صحيح',
            'price.numeric' => 'السعر يجب أن يكون رقماً',
            'price.min' => 'السعر يجب أن يكون 0 أو أكثر',
            'price_min.numeric' => 'الحد الأدنى للسعر يجب أن يكون رقماً',
            'price_min.min' => 'الحد الأدنى للسعر يجب أن يكون 0 أو أكثر',
            'price_max.numeric' => 'الحد الأقصى للسعر يجب أن يكون رقماً',
            'price_max.min' => 'الحد الأقصى للسعر يجب أن يكون 0 أو أكثر',
            'payment_type.in' => 'نوع الدفع غير صحيح',
            'city.string' => 'المدينة يجب أن تكون نصاً',
            'city.max' => 'المدينة يجب أن لا تتجاوز 255 حرف',
            'space.numeric' => 'المساحة يجب أن تكون رقماً',
            'space.min' => 'المساحة يجب أن تكون 0 أو أكثر',
            'brushes_status.in' => 'حالة الأثاث غير صحيحة',
            'facade.in' => 'الواجهة غير صحيحة',
            'number_of_rooms.integer' => 'عدد الغرف يجب أن يكون رقماً صحيحاً',
            'number_of_rooms.min' => 'عدد الغرف يجب أن يكون 0 أو أكثر',
            'number_of_bathrooms.integer' => 'عدد الحمامات يجب أن يكون رقماً صحيحاً',
            'number_of_bathrooms.min' => 'عدد الحمامات يجب أن يكون 0 أو أكثر',
            'floor.integer' => 'الطابق يجب أن يكون رقماً صحيحاً',
            'floor.min' => 'الطابق يجب أن يكون 0 أو أكثر',
            'description.string' => 'الوصف يجب أن يكون نصاً',
        ];
    }
}
