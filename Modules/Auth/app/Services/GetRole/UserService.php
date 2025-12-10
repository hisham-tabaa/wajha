<?php

namespace Modules\Auth\Services\GetRole;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Http\Requests\ChangeUserRoleRequest;
use Modules\Auth\Models\User;
use Spatie\Permission\Models\Role;

class UserService implements UserInterface
{
    public function getRoles()
    {
        try {
            $roles = Role::whereIn('name', ['user', 'seller'])->get();

            return [true, $roles, 200, 'تم جلب الأدوار بنجاح'];
        } catch (Exception $e) {
            Log::error(' UserService@getRoles', [
                'File' => $e->getFile(),
                'Line' => $e->getLine(),
                'Message' => $e->getMessage(),
            ]);

            return [false, [], 500, 'حدث خطأ أثناء جلب الأدوار'];
        }
    }

    //  public function changeRole(int $userId, string $newRole)
    // {
    // }
    public function changeUserRole(ChangeUserRoleRequest $request): array
    {
        try {
            $user = User::find(Auth::id());
            if (! $user) {
                return [false, null, 404, 'المستخدم غير موجود.'];
            }
            if (! $user->is_choiced_account) {
                return [false, null, 400, 'هذا المستخدم قد غير حسابه من قبل.'];
            }

            // جلب الرول من جدول الأدوار
            $role = Role::find($request->role_id)->first();
            if (! $role) {
                return [false, null, 404, 'الرول غير موجود.'];
            }

            // إزالة الرول القديم (default) وتعيين الجديد
            $user->removeRole('default');
            $user->assignRole($role->name);

            // تحديث الـ role_id في جدول users (اختياري لو تريد)
            $user->role_id = $role->id;
            $user->is_choiced_account = true;
            $user->save();

            return [true, $user, 200, 'تم تغيير الرول بنجاح.'];
        } catch (Exception $e) {
            Log::error('UserService@changeUserRole', [
                'File' => $e->getFile(),
                'Line' => $e->getLine(),
                'Message' => $e->getMessage(),
            ]);

            return [false, null, 500, 'فشل في تغيير الرول.'];
        }
    }
}
