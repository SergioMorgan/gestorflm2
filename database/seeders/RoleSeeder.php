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
     *
     * @return void
     */
    public function run()
    {
        $admin      = Role::create(['name' => 'admin']);
        $supervisor = Role::create(['name' => 'supervisor']);
        $operador   = Role::create(['name' => 'operador']);
        $usuario    = Role::create(['name' => 'usuario']);
        $cliente   = Role::create(['name' => 'cliente']);


        Permission::create(['name' => 'users.index'])    ->syncRoles([$admin, $supervisor, ]);
        Permission::create(['name' => 'users.create'])   ->syncRoles([$admin]);
        Permission::create(['name' => 'users.destroy'])  ->syncRoles([$admin]);
        Permission::create(['name' => 'sites.index'])   ->syncRoles([$admin, $supervisor, $operador, $usuario, $cliente]);
        Permission::create(['name' => 'sites.create'])  ->syncRoles([$admin, $supervisor]);
        Permission::create(['name' => 'sites.destroy']) ->syncRoles([$admin, $supervisor]);

    }
}
