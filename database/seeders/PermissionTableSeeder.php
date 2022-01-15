<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create([
            'name' => 'rolelist',
            'display_name' => 'Role List',
            'module_name' => 'Role Management',
        ]);
        Permission::create([
            'name' => 'rolecreate',
            'display_name' => 'Role Create',
            'module_name' => 'Role Management',
        ]);
        Permission::create([
            'name' => 'roleupdate',
            'display_name' => 'Role Update',
            'module_name' => 'Role Management',
        ]);
        Permission::create([
            'name' => 'roledelete',
            'display_name' => 'Role Delete',
            'module_name' => 'Role Management',
        ]);
        Permission::create([
            'name' => 'userrolelist',
            'display_name' => 'User Role List',
            'module_name' => 'User Management',
        ]);
        Permission::create([
            'name' => 'userroleupdate',
            'display_name' => 'User Role Update',
            'module_name' => 'User Management',
        ]);


        Role::create([
            'name' => 'admin',
            'display_name' => 'Admin'
        ]);
        Role::create([
            'name' => 'user',
            'display_name' => 'User'
        ]);

    }
}
