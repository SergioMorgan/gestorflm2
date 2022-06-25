<?php

namespace Database\Seeders;

use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Storage::deleteDirectory('users');
        // Storage::makeDirectory('users');
        
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        Site::factory(5000)->create();
        // User::factory(5)->create();
    }
}
