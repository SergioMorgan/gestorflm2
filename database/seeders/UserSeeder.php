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
            // 'profile'           => 'USUARIO',
            'status'            => 'ACTIVO',
        ])->assignRole('admin');

        User::create([
            'name'              => 'Un supervisor',
            'email'             => 'supervisor@gmail.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
            // 'profile'           => 'USUARIO',
            'status'            => 'ACTIVO',
        ])->assignRole('supervisor');

        User::create([
            'name'              => 'telefonica',
            'email'             => 'telefonica@gmail.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
            // 'profile'           => 'USUARIO',
            'status'            => 'ACTIVO',
        ])->assignRole('cliente');

        // User::factory(2)->create()->each(function($user){
        //     $user->assignRole('operador');
        // });

        // User::factory(2)->create()->each(function($user){
        //     $user->assignRole('supervisor');
        // });

        // User::factory(2)->create()->each(function($user){
        //     $user->assignRole('usuario');
        // });
    }
}
