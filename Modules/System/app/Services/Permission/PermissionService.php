<?php

namespace Modules\System\Services\Permission;

use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class PermissionService
 *
 * Handles CRUD operations for Permissions and their associated permissions.
 */
class PermissionService implements IPermissionService
{

    /**
     * Summary of list
     * @return mixed
     */
    public function list(): array
    {
        try {
            $results = Permission::all()
                ->groupBy('group')
                ->map(function ($permissions, $group) {
                    return [
                        'group' => $group,
                        'group_en' => $permissions->first()->group_en,
                        'group_ar' => $permissions->first()->group_ar,
                        'permissions' => $permissions->map(function ($perm) {
                            return [
                                'id' => $perm->id,
                                'name' => $perm->name,
                                'name_ar' => $perm->name_ar,
                                'name_en' => $perm->name_en,
                            ];
                        })->values()
                    ];
                })
                ->values();
            return [true, $results, 200, 'تم تحديث الصلاحيات بنجاح'];
        } catch (Exception $e) {
            Log::error('Failed to get Permissions: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Update the Permission's name and permissions.
     *
     * @param int $id
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function update(int $id, array $data): array
    {
        try {
            $Permission = Permission::find($id);
            if (!$Permission) {
                Log::error("Permission not found for updating: ID {$id}");
                return [false, [], 404, 'الصلاحية غير موجودة'];
            }
            $Permission->update(['name_ar' => $data['name_ar'], 'name_en' => $data['name_en']]);
            return [true, $Permission, 201, 'تم تحديث الصلاحية بنجاح'];
        } catch (Exception $e) {
            Log::error('Failed to update Permission: ' . $e->getMessage());
            return [false, [], 500, 'فشل في جلب الصلاحيات'];
        }
    }

    /**
     * Get a Permission by ID with its permissions.
     *
     * @param int $id
     * @return array
     * @throws ModelNotFoundException
     */
    public function get(int $id): array
    {
        try {
            $Permission = Permission::find($id);
            if (!$Permission) {
                return [false, [], 404, 'الصلاحية غير موجودة'];
            }
            return [true, $Permission, 200, 'تم جلب الصلاحية بنجاح'];
        } catch (Exception $e) {
            Log::error('Failed to get Permission ID=' . $id . ': ' . $e->getMessage());
            return [false, [], 500, 'فشل في جلب الصلاحية'];
        }
    }
}
