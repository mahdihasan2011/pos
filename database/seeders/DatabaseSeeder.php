<?php

namespace Database\Seeders;

use App\Model\Company;
use App\Model\Role;
use App\Model\Setting;
use App\Model\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);

        $user = User::updateOrCreate(
            ['email' => 'systemadmin@gmail.com'],
            [
                'name' => 'System Admin',
                'email' => 'systemadmin@gmail.com',
                'password' => Hash::make('123456')
            ]
        );
        $role = Role::updateOrCreate(
            ['name' => 'superadmin', 'guard_name' => 'web'],
            ['display_name' => 'System Admin']
        );
        $user->assignRole([$role->id]);

        Role::updateOrCreate(
            ['name' => 'admin', 'guard_name' => 'web'],
            ['display_name' => 'Admin']
        );

        Role::updateOrCreate(
            ['name' => 'user', 'guard_name' => 'web'],
            ['display_name' => 'User']
        );

        // Example: Seed a settings table with default values
        Company::updateOrCreate(
            ['id' => 1],
            [
                'title' => 'PoS Title',
                'name' => 'Default Name',
                'phone' => '01913456789',
                'email' => 'admin@example.com',
                'website' => 'https://example.com',
                'address' => '123 Main St, City, Country',
                'invoice_note' => 'Thank you for your business!',
                'logo' => 'public/logo/icon.png',
            ]
        );

        // Seed the settings table with default values
        Setting::updateOrCreate(
            ['id' => 1],
            [
                'purchase_code_initial' => 'P',
                'sale_code_initial' => 'S',
                'item_code_initial' => null,
                'purchase_terminal' => 'normal',
                'sale_terminal' => '2',
                'menu_position' => 'sidebar-mini',
                'brand_logo_variant' => 'cyan',
                'navbar_variant' => 'cyan',
                'sidebar_variant' => 'sidebar-dark sidebar-dark-light',
                'flat_sidebar' => null,
                'sidebar_child_menu' => 'on',
                'vat_percentage' => 0,
            ]
        );
        $user = User::create([
            'name' => 'System Admin',
            'email' => 'systemadmin@gmail.com',
            'password' => Hash::make('123456')
        ]);
        $role = Role::create([
            'name' => 'superadmin',
            'guard_name' => 'web',
            'display_name' => 'System Admin'
        ]);
        $user->assignRole([$role->id]);

        Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
            'display_name' => 'Admin'
        ]);
        Role::create([
            'name' => 'user',
            'guard_name' => 'web',
            'display_name' => 'User'
        ]);
    }
}
