<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'confirm users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'confirm posts']);
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'give permissions']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'give roles']);
        Role::create(['name' => 'admin'])->givePermissionTo([
            'create users',
            'confirm users',
            'edit users',
            'delete users',
            'create posts',
            'confirm posts',
            'edit posts',
            'delete posts',
            'create permissions',
            'give permissions',
            'create roles',
            'give roles',
        ]);
        Role::create(['name' => 'user'])->givePermissionTo([
            'create posts',
            'edit posts',
            'delete posts',
            ]);
    }
}
