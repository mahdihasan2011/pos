<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
                            'name' => 'Super Admin',
                            'email' => 'superadmin@gmail.com',
                            'password' => Hash::make('123456')
                        ]);
        $role = Role::create([
                            'name' => 'superadmin',
                            'display_name' => 'Super Admin'
                        ]);
        $user->assignRole([$role->id]);

    }
}
