<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'delete any user',
            'update any user',
            'delete any comment',
            'update any comment',
            'create any comment',
            'create any post',
            'update any post',
            'delete any post',
            'create any community',
            'update any community',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $role = Role::create(['name' => 'admin']);
        $role->syncPermissions(Permission::all());

        $role = Role::create(['name' => 'user']);
        $role->syncPermissions([
            'create any comment',
            'create any post',
        ]);
    }
}
