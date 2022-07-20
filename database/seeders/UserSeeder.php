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
            'name'              => 'Sergio Morgan',
            'email'             => 'morgan.sergio@gmail.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ])->assignRole('admin');

        User::create([
            'name'              => 'admin general (no borrar)',
            'email'             => 'admin@gmail.com',
            'password'          => bcrypt('Admin4321'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ])->assignRole('admin');

        User::create([
            'name'              => 'Sup general (no borrar)',
            'email'             => 'supervisor@gmail.com',
            'password'          => bcrypt('Supervisor4321'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ])->assignRole('supervisor');

        User::create([
            'name'              => 'operador general (no borrar)',
            'email'             => 'operador@gmail.com',
            'password'          => bcrypt('Operador4321'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ])->assignRole('operador');

        User::create([
            'name'              => 'usuario general (no borrar)',
            'email'             => 'usuario@gmail.com',
            'password'          => bcrypt('Usuario4321'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ])->assignRole('usuario');

        User::create([
            'name'              => 'cliente general (no borrar)',
            'email'             => 'cliente@gmail.com',
            'password'          => bcrypt('Cliente4321'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ])->assignRole('cliente');
    }
}
