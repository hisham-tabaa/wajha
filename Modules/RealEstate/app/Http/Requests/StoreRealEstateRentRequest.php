<?php

namespace Modules\RealEstate\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRealEstateRentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'publisher' => 'nullable|in:values:config(real_estate.publishers)',
            'main_address' => 'required|string|max:255',
            'lat' => 'nullable|numeric|between:-90,90',
            'lan' => 'nullable|numeric|between:-180,180',
            'type' => 'required|in:values:config(real_estate.property_types)',
            'price' => 'required|numeric|min:0',
            'price_min' => 'nullable|numeric|min:0',
            'price_max' => 'nullable|numeric|min:0',
            'payment_type' => 'required|in:values:config(real_estate.payment_types)',
            'rent_type' => 'required|in:values:config(real_estate.rent_types)',
            'rate_allowed_for' => 'nullable|in:values:config(real_estate.allowed_for)',
            'city' => 'nullable|string|max:255',
            'space' => 'required|numeric|min:0',
            'brushes_status' => 'required|in:values:config(real_estate.furniture_status)',
            'facade' => 'required|in:values:config(real_estate.facades)',
            'number_of_rooms' => 'required|integer|min:0',
            'number_of_bathrooms' => 'required|integer|min:0',
            'floor' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'publisher.in' => 'الناشر غير صحيح',
            'main_address.required' => 'العنوان الرئيسي مطلوب',
            'main_address.string' => 'العنوان الرئيسي يجب أن يكون نصاً',
            'main_address.max' => 'العنوان الرئيسي يجب أن لا يتجاوز 255 حرف',
            'lat.numeric' => 'خط العرض يجب أن يكون رقماً',
            'lat.between' => 'خط العرض يجب أن يكون بين -90 و 90',
            'lan.numeric' => 'خط الطول يجب أن يكون رقماً',
            'lan.between' => 'خط الطول يجب أن يكون بين -180 و 180',
            'type.required' => 'نوع العقار مطلوب',
            'type.in' => 'نوع العقار غير صحيح',
            'price.required' => 'السعر مطلوب',
            'price.numeric' => 'السعر يجب أن يكون رقماً',
            'price.min' => 'السعر يجب أن يكون 0 أو أكثر',
            'price_min.numeric' => 'الحد الأدنى للسعر يجب أن يكون رقماً',
            'price_min.min' => 'الحد الأدنى للسعر يجب أن يكون 0 أو أكثر',
            'price_max.numeric' => 'الحد الأقصى للسعر يجب أن يكون رقماً',
            'price_max.min' => 'الحد الأقصى للسعر يجب أن يكون 0 أو أكثر',
            'payment_type.required' => 'نوع الدفع مطلوب',
            'payment_type.in' => 'نوع الدفع غير صحيح',
            'rent_type.required' => 'نوع الإيجار مطلوب',
            'rent_type.in' => 'نوع الإيجار غير صحيح',
            'rate_allowed_for.in' => 'الفئة المسموحة غير صحيحة',
            'city.string' => 'المدينة يجب أن تكون نصاً',
            'city.max' => 'المدينة يجب أن لا تتجاوز 255 حرف',
            'space.required' => 'المساحة مطلوبة',
            'space.numeric' => 'المساحة يجب أن تكون رقماً',
            'space.min' => 'المساحة يجب أن تكون 0 أو أكثر',
            'brushes_status.required' => 'حالة الأثاث مطلوبة',
            'brushes_status.in' => 'حالة الأثاث غير صحيحة',
            'facade.required' => 'الواجهة مطلوبة',
            'facade.in' => 'الواجهة غير صحيحة',
            'number_of_rooms.required' => 'عدد الغرف مطلوب',
            'number_of_rooms.integer' => 'عدد الغرف يجب أن يكون رقماً صحيحاً',
            'number_of_rooms.min' => 'عدد الغرف يجب أن يكون 0 أو أكثر',
            'number_of_bathrooms.required' => 'عدد الحمامات مطلوب',
            'number_of_bathrooms.integer' => 'عدد الحمامات يجب أن يكون رقماً صحيحاً',
            'number_of_bathrooms.min' => 'عدد الحمامات يجب أن يكون 0 أو أكثر',
            'floor.integer' => 'الطابق يجب أن يكون رقماً صحيحاً',
            'floor.min' => 'الطابق يجب أن يكون 0 أو أكثر',
            'description.string' => 'الوصف يجب أن يكون نصاً',
        ];
    }
}
