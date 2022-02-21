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
            'name' => 'role_list',
            'display_name' => 'Role List',
            'module_name' => 'Role Management',
        ]);
        Permission::create([
            'name' => 'role_create',
            'display_name' => 'Role Create',
            'module_name' => 'Role Management',
        ]);
        Permission::create([
            'name' => 'role_update',
            'display_name' => 'Role Update',
            'module_name' => 'Role Management',
        ]);
        Permission::create([
            'name' => 'role_delete',
            'display_name' => 'Role Delete',
            'module_name' => 'Role Management',
        ]);
        Permission::create([
            'name' => 'user_role_list',
            'display_name' => 'User Role List',
            'module_name' => 'User Management',
        ]);
        Permission::create([
            'name' => 'user_role_create',
            'display_name' => 'User Role Create',
            'module_name' => 'User Management',
        ]);
        Permission::create([
            'name' => 'user_role_update',
            'display_name' => 'User Role Update',
            'module_name' => 'User Management',
        ]);
        Permission::create([
            'name' => 'user_password_update',
            'display_name' => 'User Password Update',
            'module_name' => 'User Management',
        ]);
        Permission::create([
            'name' => 'settings',
            'display_name' => 'Settings',
            'module_name' => 'Configuration Management',
        ]);
        Permission::create([
            'name' => 'company_info',
            'display_name' => 'Company Info',
            'module_name' => 'Configuration Management',
        ]);
        Permission::create([
            'name' => 'company_update',
            'display_name' => 'Company Info Update',
            'module_name' => 'Configuration Management',
        ]);
        Permission::create([
            'name' => 'customer_list',
            'display_name' => 'Customer List',
            'module_name' => 'Configuration Management',
        ]);
        Permission::create([
            'name' => 'customer_create',
            'display_name' => 'Customer Create',
            'module_name' => 'Configuration Management',
        ]);
        Permission::create([
            'name' => 'customer_update',
            'display_name' => 'Customer Update',
            'module_name' => 'Configuration Management',
        ]);
        Permission::create([
            'name' => 'customer_delete',
            'display_name' => 'Customer Delete',
            'module_name' => 'Configuration Management',
        ]);
        Permission::create([
            'name' => 'supplier_create',
            'display_name' => 'Supplier Create',
            'module_name' => 'Configuration Management',
        ]);
        Permission::create([
            'name' => 'supplier_list',
            'display_name' => 'Supplier List',
            'module_name' => 'Configuration Management',
        ]);
        Permission::create([
            'name' => 'supplier_update',
            'display_name' => 'Supplier Update',
            'module_name' => 'Configuration Management',
        ]);
        Permission::create([
            'name' => 'supplier_delete',
            'display_name' => 'Supplier Delete',
            'module_name' => 'Configuration Management',
        ]);
        Permission::create([
            'name' => 'product_create',
            'display_name' => 'Product Create',
            'module_name' => 'Product Management',
        ]);
        Permission::create([
            'name' => 'product_list',
            'display_name' => 'Product List',
            'module_name' => 'Product Management',
        ]);
        Permission::create([
            'name' => 'product_update',
            'display_name' => 'Product Update',
            'module_name' => 'Product Management',
        ]);
        Permission::create([
            'name' => 'product_delete',
            'display_name' => 'Product Delete',
            'module_name' => 'Product Management',
        ]);
        Permission::create([
            'name' => 'category_create',
            'display_name' => 'Category Create',
            'module_name' => 'Product Management',
        ]);
        Permission::create([
            'name' => 'category_list',
            'display_name' => 'Category List',
            'module_name' => 'Product Management',
        ]);
        Permission::create([
            'name' => 'category_update',
            'display_name' => 'Category Update',
            'module_name' => 'Product Management',
        ]);
        Permission::create([
            'name' => 'category_delete',
            'display_name' => 'Category Delete',
            'module_name' => 'Product Management',
        ]);
        Permission::create([
            'name' => 'brand_create',
            'display_name' => 'Brand Create',
            'module_name' => 'Product Management',
        ]);
        Permission::create([
            'name' => 'brand_list',
            'display_name' => 'Brand List',
            'module_name' => 'Product Management',
        ]);
        Permission::create([
            'name' => 'brand_update',
            'display_name' => 'Brand Update',
            'module_name' => 'Product Management',
        ]);
        Permission::create([
            'name' => 'brand_delete',
            'display_name' => 'Brand Delete',
            'module_name' => 'Product Management',
        ]);
        Permission::create([
            'name' => 'color_create',
            'display_name' => 'Color Create',
            'module_name' => 'Product Management',
        ]);
        Permission::create([
            'name' => 'color_list',
            'display_name' => 'Color List',
            'module_name' => 'Product Management',
        ]);
        Permission::create([
            'name' => 'color_update',
            'display_name' => 'Color Update',
            'module_name' => 'Product Management',
        ]);
        Permission::create([
            'name' => 'color_delete',
            'display_name' => 'Color Delete',
            'module_name' => 'Product Management',
        ]);
        Permission::create([
            'name' => 'size_create',
            'display_name' => 'Size Create',
            'module_name' => 'Product Management',
        ]);
        Permission::create([
            'name' => 'size_list',
            'display_name' => 'Size List',
            'module_name' => 'Product Management',
        ]);
        Permission::create([
            'name' => 'size_update',
            'display_name' => 'Size Update',
            'module_name' => 'Product Management',
        ]);
        Permission::create([
            'name' => 'size_delete',
            'display_name' => 'Size Delete',
            'module_name' => 'Product Management',
        ]);
        Permission::create([
            'name' => 'purchase',
            'display_name' => 'Product Purchase',
            'module_name' => 'Purchase Management',
        ]);
        Permission::create([
            'name' => 'purchase_date',
            'display_name' => 'Purchase Date Update',
            'module_name' => 'Purchase Management',
        ]);
        Permission::create([
            'name' => 'sale',
            'display_name' => 'Product Sale',
            'module_name' => 'Sale Management',
        ]);
        Permission::create([
            'name' => 'sale_date',
            'display_name' => 'Sale Date Update',
            'module_name' => 'Sale Management',
        ]);
        Permission::create([
            'name' => 'stock_list',
            'display_name' => 'Stock List',
            'module_name' => 'Stock Management',
        ]);
        Permission::create([
            'name' => 'purchase_report',
            'display_name' => 'Purchase Report',
            'module_name' => 'Report Management',
        ]);
        Permission::create([
            'name' => 'sale_report',
            'display_name' => 'Sale Report',
            'module_name' => 'Report Management',
        ]);
        Permission::create([
            'name' => 'expense_list',
            'display_name' => 'Expense List',
            'module_name' => 'Accounts Management',
        ]);
        Permission::create([
            'name' => 'expense_create',
            'display_name' => 'Expense Create',
            'module_name' => 'Accounts Management',
        ]);
        Permission::create([
            'name' => 'expense_update',
            'display_name' => 'Expense Update',
            'module_name' => 'Accounts Management',
        ]);
        Permission::create([
            'name' => 'expense_date',
            'display_name' => 'Expense Date',
            'module_name' => 'Accounts Management',
        ]);
        Permission::create([
            'name' => 'expense_delete',
            'display_name' => 'Expense Delete',
            'module_name' => 'Accounts Management',
        ]);
        Permission::create([
            'name' => 'expense_type_list',
            'display_name' => 'Expense Type List',
            'module_name' => 'Accounts Management',
        ]);
        Permission::create([
            'name' => 'expense_type_create',
            'display_name' => 'Expense Type Create',
            'module_name' => 'Accounts Management',
        ]);
        Permission::create([
            'name' => 'expense_type_update',
            'display_name' => 'Expense Type Update',
            'module_name' => 'Accounts Management',
        ]);
        Permission::create([
            'name' => 'expense_type_delete',
            'display_name' => 'Expense Type Delete',
            'module_name' => 'Accounts Management',
        ]);

    }
}
