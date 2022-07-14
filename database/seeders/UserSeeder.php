<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name'              => 'admin',
            'email'             => 'admin@gmail.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
            // 'profile'           => 'USUARIO',
            // 'status'            => 'ACTIVO',
        ])->assignRole('admin');

        User::create([
            'name'              => 'supervisor',
            'email'             => 'supervisor@gmail.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
            // 'profile'           => 'USUARIO',
            // 'status'            => 'ACTIVO',
        ])->assignRole('supervisor');

        User::create([
            'name'              => 'operador',
            'email'             => 'operador@gmail.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
            // 'profile'           => 'USUARIO',
            // 'status'            => 'ACTIVO',
        ])->assignRole('operador');

        User::create([
            'name'              => 'usuario',
            'email'             => 'usuario@gmail.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
            // 'profile'           => 'USUARIO',
            // 'status'            => 'ACTIVO',
        ])->assignRole('usuario');

        User::create([
            'name'              => 'cliente',
            'email'             => 'cliente@gmail.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
            // 'profile'           => 'USUARIO',
            // 'status'            => 'ACTIVO',
        ])->assignRole('cliente');



        User::factory(2)->create()->each(function($user){
            $user->assignRole('admin');
        });

        User::factory(3)->create()->each(function($user){
            $user->assignRole('supervisor');
        });

        User::factory(10)->create()->each(function($user){
            $user->assignRole('operador');
        });

        User::factory(5)->create()->each(function($user){
            $user->assignRole('usuario');
        });

        User::factory(5)->create()->each(function($user){
            $user->assignRole('cliente');
        });
    }
}
