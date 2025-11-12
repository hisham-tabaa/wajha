<?php

namespace App\Helpers;

trait AuthorizeCusTrait
{
    /**
     * تحقق من الصلاحية وترجع مصفوفة بدل Exception.
     *
     * @param  string  $ability  اسم الصلاحية مثل 'view', 'update', 'delete', ...
     * @param  mixed  $model  الموديل أو الكلاس
     * @return array [$status, $data, $code, $message]
     */
    protected function authorizeArray(string $ability, $model): array
    {
        $user = auth()->user();

        // تحقق إذا كان لدى Laravel القدرة على التفويض
        if (method_exists($this->gate(), 'forUser')) {
            $gate = $this->gate()->forUser($user);

            if ($gate->check($ability, $model)) {
                return [true, $model, 200, 'تم السماح بالوصول'];
            } else {
                return [false, null, 403, 'ليس لديك صلاحية للوصول لهذا الإجراء'];
            }
        }

        return [false, null, 403, 'بوابة الصلاحيات غير متوفرة'];
    }

    /**
     * إرجاع الـ Gate الخاص بـ Laravel
     */
    protected function gate()
    {
        return app(\Illuminate\Contracts\Auth\Access\Gate::class);
    }
}
