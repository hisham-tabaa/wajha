<?php
//Database\Seeders\RolesSeeder
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $roles = config('roles_permissions.roles');
        DB::transaction(function () use ($roles) {
            $uniqueRoles = collect($roles)->unique('name');

            foreach ($uniqueRoles as $roleData) {
                $existingRole = Role::where('name', $roleData['name'])->first();
                if (!$existingRole) {
                    $newRoleData = [
                        'name' => $roleData['name'],
                        'guard_name' => 'web',
                        'name_ar' => $roleData['name_ar'],
                        'name_en' => $roleData['name_en'],
                    ];

                    if (in_array($roleData['name'], ['super-admin', 'student', 'assistant', 'default', 'teacher'])) {
                        $newRoleData['can_delete'] = false;
                    }

                    if ($roleData['name'] === 'admin') {
                        $newRoleData['policy'] = null;
                    } else {
                        $newRoleData['policy'] = null;
                    }

                    $roleModel = Role::create($newRoleData);
                } else {
                    $roleModel = $existingRole;
                }

                $permissions = collect(config('roles_permissions.' . $roleData['name']));
                $roleModel->givePermissionTo($permissions->toArray());
            }
        });

        $this->command->info('Roles have been set up successfully.');
    }
}
