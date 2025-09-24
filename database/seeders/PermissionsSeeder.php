<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        $permissions = config('roles_permissions.permissions', []);

        DB::transaction(function () use ($permissions) {
            $allPermissions = collect($permissions)
                ->unique('name')
                ->values();
            foreach ($allPermissions as $permission) {
                if (!isset($permission['name'], $permission['name_ar'], $permission['name_en'])) {
                    Log::warning('Permission missing keys', $permission);
                    continue;
                }

                Permission::updateOrCreate(
                    ['name' => $permission['name']],
                    [
                        'name_ar' => $permission['name_ar'],
                        'name_en' => $permission['name_en'],
                        'group' => $permission['group'],
                        'group_en' => $permission['group_en'],
                        'group_ar' => $permission['group_ar'],
                        'guard_name' => 'web',
                    ]
                );
            }
        });

        $this->command->info('Permissions have been set up successfully.');
    }
}
