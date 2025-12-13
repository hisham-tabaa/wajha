<?php

namespace Modules\System\Services\Role;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\System\Http\Requests\Role\AddRoleRequest;
use Modules\System\Http\Requests\Role\UpdateRoleRequest;
use Spatie\Permission\Models\Role;

/**
 * Class RoleService
 *
 * Handles CRUD operations for roles and their associated permissions.
 */
class RoleService implements IRoleService
{
    /**
     * جلب جميع الأدوار
     *
     * @return array [status, data, code, message]
     */
    public function list(): array
    {
        try {
            $roles = Role::get();

            return [true, $roles, 200, 'تم جلب الأدوار بنجاح.'];
        } catch (Exception $e) {
            Log::error('Failed to get roles: '.$e->getMessage());

            return [false, [], 500, 'فشل في جلب الأدوار.'];
        }
    }

    /**
     * إنشاء دور جديد
     *
     * @return array [status, data, code, message]
     */
    public function create(AddRoleRequest $request): array
    {
        try {
            $data = $request->validated();

            $role = Role::create([
                'guard_name' => 'web',
                'name_en' => $data['name_en'],
                'name_ar' => $data['name_ar'],
                'name' => strtolower(str_replace(' ', '-', $data['name_en'])),
                'policy' => config('role_policy.policy.'.$data['policy']),
                'can_delete' => $data['can_delete'],
            ]);

            $role->syncPermissions($data['permissions']);
            $role->load('permissions');

            return [true, $role, 201, 'تم إنشاء الدور بنجاح.'];
        } catch (Exception $e) {
            Log::error('Failed to create role: '.$e->getMessage());

            return [false, [], 500, 'فشل في إنشاء الدور.'];
        }
    }

    /**
     * تحديث دور محدد
     *
     * @return array [status, data, code, message]
     */
    public function update(int $id, UpdateRoleRequest $request): array
    {
        try {
            $data = $request->validated();
            $role = Role::find($id);

            if (! $role) {
                return [false, [], 404, 'الدور غير موجود.'];
            }

            if ($role->name === 'admin') {
                return [false, [], 400, "'لا يمكن تعديل دور 'المشرف"];
            }

            if ($role->name === 'default') {
                $data['name'] = 'default';
            }

            if (isset($data['name_en'])) {
                $data['name'] = strtolower(str_replace(' ', '-', $data['name_en']));
            }

            if (isset($data['policy'])) {
                $data['policy'] = config('role_policy.policy.'.$data['policy']);
            }

            $role->update($data);

            if (isset($data['permissions'])) {
                $role->syncPermissions($data['permissions']);
            }

            $role->load('permissions');

            return [true, $role, 201, 'تم تحديث الدور بنجاح.'];
        } catch (Exception $e) {
            Log::error('Failed to update role: '.$e->getMessage());

            return [false, [], 500, 'فشل في تحديث الدور.'];
        }
    }

    /**
     * حذف دور محدد
     *
     * @return array [status, data, code, message]
     */
    public function delete(int $id): array
    {
        try {
            $role = Role::find($id);

            if (! $role) {
                return [false, [], 404, 'الدور غير موجود.'];
            }

            if (! $role->can_delete) {
                return [false, [], 400, 'لا يمكن حذف هذا الدور.'];
            }

            DB::transaction(function () use ($role) {
                $defaultRole = Role::where('name', 'default')->firstOrFail();
                $users = $role->users()->get();

                foreach ($users as $user) {
                    $user->role_id = $defaultRole->id;
                    $user->save();
                    $user->removeRole($role);
                    $user->assignRole($defaultRole);
                }
                $role->delete();
            });

            return [true, [], 201, 'تم حذف الدور بنجاح.'];
        } catch (Exception $e) {
            Log::error('Failed to delete role: '.$e->getMessage());

            return [false, [], 500, 'فشل في حذف الدور.'];
        }
    }

    /**
     * عرض دور محدد مع صلاحياته
     *
     * @return array [status, data, code, message]
     */
    public function get(int $id): array
    {
        try {
            $role = Role::with('permissions')->find($id);
            if (! $role) {
                return [false, [], 404, 'الدور غير موجود.'];
            }

            return [true, $role, 200, 'تم جلب الدور بنجاح.'];
        } catch (Exception $e) {
            Log::error('Failed to get role ID='.$id.': '.$e->getMessage());

            return [false, [], 500, 'فشل في جلب الدور.'];
        }
    }
}
