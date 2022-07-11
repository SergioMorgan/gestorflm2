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
        $admin      = Role::create(['name' => 'admin']);        //adminsitrador general del sistema
        $supervisor = Role::create(['name' => 'supervisor']);   // jefe de CGA o de operaciones
        $operador   = Role::create(['name' => 'operador']);     // operador de CGA
        $usuario    = Role::create(['name' => 'usuario']);      // usuarios generales interos
        $cliente    = Role::create(['name' => 'cliente']);      // usuarioe externos


        Permission::create(['name' => 'users.index'])           ->syncRoles([$admin, $supervisor, ]);
        Permission::create(['name' => 'users.create'])          ->syncRoles([$admin]);
        Permission::create(['name' => 'users.destroy'])         ->syncRoles([$admin]);
        Permission::create(['name' => 'sites.index'])           ->syncRoles([$admin, $supervisor, $operador, $usuario, $cliente]);
        Permission::create(['name' => 'sites.create'])          ->syncRoles([$admin, $supervisor]);
        Permission::create(['name' => 'sites.destroy'])         ->syncRoles([$admin, $supervisor]);
        Permission::create(['name' => 'ostickets.index'])       ->syncRoles([$admin, $supervisor, $operador, $usuario]);
        Permission::create(['name' => 'ostickets.create'])      ->syncRoles([$admin, $supervisor, $operador]);
        Permission::create(['name' => 'ostickets.destroy'])     ->syncRoles([$admin, $supervisor]);
        Permission::create(['name' => 'clockstops.index'])      ->syncRoles([$admin, $supervisor, $operador, $usuario]);
        Permission::create(['name' => 'clockstops.create'])     ->syncRoles([$admin, $supervisor, $operador]);
        Permission::create(['name' => 'clockstops.destroy'])    ->syncRoles([$admin, $supervisor, $operador]);
        Permission::create(['name' => 'actions.index'])         ->syncRoles([$admin, $supervisor, $operador, $usuario]);
        Permission::create(['name' => 'actions.create'])        ->syncRoles([$admin, $supervisor, $operador, $usuario]);
        Permission::create(['name' => 'actions.destroy'])       ->syncRoles([$admin, $supervisor]);
        Permission::create(['name' => 'dashboard.index'])       ->syncRoles([$admin, $supervisor, $operador, $usuario]);
    }
}
