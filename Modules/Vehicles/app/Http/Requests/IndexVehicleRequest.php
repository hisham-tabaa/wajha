<?php

namespace Modules\Vehicles\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexVehicleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'per_page' => 'nullable|integer|min:1|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'per_page.integer' => 'عدد العناصر يجب أن يكون رقماً صحيحاً',
            'per_page.min' => 'عدد العناصر يجب أن يكون 1 على الأقل',
            'per_page.max' => 'عدد العناصر لا يمكن أن يتجاوز 100',
        ];
    }
}
