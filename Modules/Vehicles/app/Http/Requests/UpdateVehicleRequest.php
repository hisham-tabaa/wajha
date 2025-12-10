<?php

namespace Modules\Vehicles\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'publisher' => 'nullable|string|max:255',
            'offer_type' => 'nullable|in:sale,rent',
            'main_address' => 'nullable|string|max:255',
            'lat' => 'nullable|numeric|between:-90,90',
            'lan' => 'nullable|numeric|between:-180,180',
            'price' => 'nullable|numeric|min:0',
            'payment_type' => 'nullable|string|max:255',
            'installment_years' => 'nullable|integer|in:1,2,3,4',
            'rent_type' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'year' => 'nullable|integer|min:1900|max:'.date('Y'),
            'color' => 'nullable|string|max:255',
            'transmission' => 'nullable|string|max:255',
            'fuel_type' => 'nullable|string|max:255',
            'country_of_origin' => 'nullable|string|max:255',
            'cylinder' => 'nullable|integer|min:3',
            'insurance' => 'nullable|in:mandatory,optional,comprehensive',
            'engine_capacity' => 'nullable|numeric|min:0',
            'power_horses' => 'nullable|integer|min:0',
            'mileage' => 'nullable|numeric|min:0',
            'condition' => 'nullable|string|max:255',
            'body_type' => 'nullable|string|max:255',
            'number_of_seats' => 'nullable|integer|min:0',
            'number_of_doors' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'publisher.string' => 'اسم الناشر يجب أن يكون نصاً',
            'publisher.max' => 'اسم الناشر لا يمكن أن يتجاوز 255 حرف',
            'offer_type.in' => 'نوع العرض يجب أن يكون إما بيع أو إيجار',
            'main_address.string' => 'العنوان الرئيسي يجب أن يكون نصاً',
            'main_address.max' => 'العنوان الرئيسي لا يمكن أن يتجاوز 255 حرف',
            'lat.numeric' => 'خط العرض يجب أن يكون رقماً',
            'lat.between' => 'خط العرض يجب أن يكون بين -90 و 90',
            'lan.numeric' => 'خط الطول يجب أن يكون رقماً',
            'lan.between' => 'خط الطول يجب أن يكون بين -180 و 180',
            'price.numeric' => 'السعر يجب أن يكون رقماً',
            'price.min' => 'السعر يجب أن يكون 0 أو أكثر',
            'payment_type.string' => 'نوع الدفع يجب أن يكون نصاً',
            'payment_type.max' => 'نوع الدفع لا يمكن أن يتجاوز 255 حرف',
            'installment_years.integer' => 'سنوات القسط يجب أن تكون رقماً صحيحاً',
            'installment_years.in' => 'سنوات القسط يجب أن تكون 1 أو 2 أو 3 أو 4',
            'rent_type.string' => 'نوع الإيجار يجب أن يكون نصاً',
            'rent_type.max' => 'نوع الإيجار لا يمكن أن يتجاوز 255 حرف',
            'city.string' => 'المدينة يجب أن تكون نصاً',
            'city.max' => 'المدينة لا يمكن أن تتجاوز 255 حرف',
            'brand.string' => 'اسم الماركة يجب أن يكون نصاً',
            'brand.max' => 'اسم الماركة لا يمكن أن يتجاوز 255 حرف',
            'model.string' => 'اسم الموديل يجب أن يكون نصاً',
            'model.max' => 'اسم الموديل لا يمكن أن يتجاوز 255 حرف',
            'year.integer' => 'السنة يجب أن تكون رقماً صحيحاً',
            'year.min' => 'السنة يجب أن تكون 1900 على الأقل',
            'year.max' => 'السنة لا يمكن أن تكون في المستقبل',
            'color.string' => 'اللون يجب أن يكون نصاً',
            'color.max' => 'اللون لا يمكن أن يتجاوز 255 حرف',
            'transmission.string' => 'ناقل الحركة يجب أن يكون نصاً',
            'transmission.max' => 'ناقل الحركة لا يمكن أن يتجاوز 255 حرف',
            'fuel_type.string' => 'نوع الوقود يجب أن يكون نصاً',
            'fuel_type.max' => 'نوع الوقود لا يمكن أن يتجاوز 255 حرف',
            'country_of_origin.string' => 'دولة المنشأ يجب أن تكون نصاً',
            'country_of_origin.max' => 'دولة المنشأ لا يمكن أن تتجاوز 255 حرف',
            'cylinder.integer' => 'عدد الأسطوانات يجب أن يكون رقماً صحيحاً',
            'cylinder.min' => 'عدد الأسطوانات يجب أن يكون 3 على الأقل',
            'insurance.in' => 'نوع التأمين يجب أن يكون إجباري أو اختياري أو شامل',
            'engine_capacity.numeric' => 'سعة المحرك يجب أن تكون رقماً',
            'engine_capacity.min' => 'سعة المحرك يجب أن تكون 0 أو أكثر',
            'power_horses.integer' => 'قوة الحصان يجب أن تكون رقماً صحيحاً',
            'power_horses.min' => 'قوة الحصان يجب أن تكون 0 أو أكثر',
            'mileage.numeric' => 'المسافة المقطوعة يجب أن تكون رقماً',
            'mileage.min' => 'المسافة المقطوعة يجب أن تكون 0 أو أكثر',
            'condition.string' => 'حالة المركبة يجب أن تكون نصاً',
            'condition.max' => 'حالة المركبة لا يمكن أن تتجاوز 255 حرف',
            'body_type.string' => 'نوع الهيكل يجب أن يكون نصاً',
            'body_type.max' => 'نوع الهيكل لا يمكن أن يتجاوز 255 حرف',
            'number_of_seats.integer' => 'عدد المقاعد يجب أن يكون رقماً صحيحاً',
            'number_of_seats.min' => 'عدد المقاعد يجب أن يكون 0 أو أكثر',
            'number_of_doors.integer' => 'عدد الأبواب يجب أن يكون رقماً صحيحاً',
            'number_of_doors.min' => 'عدد الأبواب يجب أن يكون 0 أو أكثر',
            'description.string' => 'الوصف يجب أن يكون نصاً',
        ];
    }
}
