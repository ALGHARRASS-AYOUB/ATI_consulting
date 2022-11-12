<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        //permissions for user
        Permission::create(['name' => 'add_user']);
        Permission::create(['name' => 'edit_user']);
        Permission::create(['name' => 'delete_user']);
        Permission::create(['name' => 'show_user']);
        //permissions for messages
        Permission::create(['name' => 'add_message']);
        Permission::create(['name' => 'edit_message']);
        Permission::create(['name' => 'delete_message']);
        Permission::create(['name' => 'show_message']);

        //permissions for content
        Permission::create(['name' => 'add_content']);
        Permission::create(['name' => 'edit_content']);
        Permission::create(['name' => 'delete_content']);
        Permission::create(['name' => 'show_content']);

        //permissions for team
        Permission::create(['name' => 'add_team']);
        Permission::create(['name' => 'edit_team']);
        Permission::create(['name' => 'delete_team']);
        Permission::create(['name' => 'show_team']);

        //permissions for responsability
        Permission::create(['name' => 'add_responsability']);
        Permission::create(['name' => 'edit_responsability']);
        Permission::create(['name' => 'delete_responsability']);
        Permission::create(['name' => 'show_responsability']);



        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        // or may be done by chaining
        $role = Role::create(['name' => 'moderator']);
     $role->givePermissionTo('delete_user');
        $role->givePermissionTo('show_user');
        $role->givePermissionTo('add_user');

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
