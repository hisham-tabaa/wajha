<?php

namespace Modules\Auth\Services\GetRole;

use Modules\Auth\Http\Requests\ChangeUserRoleRequest;
use Modules\Auth\Services\GetRole\UserInterface;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Models\User;

use Exception;
use Illuminate\Support\Facades\Auth;

class UserService implements UserInterface
{
    public function getRoles()
    {
        try {
            $roles = Role::whereIn('name', ['user', 'seller'])->get();

            return [true, $roles, 200,  __('auth::messages.roles_retrieved_successfully')];
        } catch (Exception $e) {
            Log::error(" UserService@getRoles", [
                'File' => $e->getFile(),
                'Line' => $e->getLine(),
                'Message' => $e->getMessage(),
            ]);
            return [false, [], 500, __('auth::messages.roles_retrieve_failed')];
        }
    }
    //  public function changeRole(int $userId, string $newRole)
    // {
    // }
    public function changeUserRole(ChangeUserRoleRequest $request): array
    {
        try {
            $user = User::find(Auth::id());
            if (!$user) {
                return [false, null, 404, __('auth::messages.user_not_found')];
            }
            if (!$user->is_choiced_account) {
                return [false, null, 400, __('auth::messages.choiced_account')];
            }

            // جلب الرول من جدول الأدوار
            $role = Role::find($request->role_id)->first();
            if (!$role) {
                return [false, null, 404, __('auth::messages.role_not_found')];
            }

            // إزالة الرول القديم (default) وتعيين الجديد
            $user->removeRole('default');
            $user->assignRole($role->name);

            // تحديث الـ role_id في جدول users (اختياري لو تريد)
            $user->role_id = $role->id;
            $user->is_choiced_account = true;
            $user->save();

            return [true, $user, 200,  __('auth::messages.role_changed_successfully')];
        } catch (Exception $e) {
            Log::error("UserService@changeUserRole", [
                'File' => $e->getFile(),
                'Line' => $e->getLine(),
                'Message' => $e->getMessage(),
            ]);
            return [false, null, 500,  __('auth::messages.role_change_failed')];
        }
    }
}
