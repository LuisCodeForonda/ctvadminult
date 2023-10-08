<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //añadimos los roles que necesitamos
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Editor']);
        $role3 = Role::create(['name' => 'Periodista']);


        Permission::create(['name' => 'dashboard'])->syncRoles([$role1]);
        Permission::create(['name' => 'users'])->syncRoles([$role1]);
        Permission::create(['name' => 'permisos'])->syncRoles([$role1]);
        Permission::create(['name' => 'programacion'])->syncRoles([$role1, $role2]);
    }
}
