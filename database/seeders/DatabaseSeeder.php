<?php

namespace Database\Seeders;

use App\Models\Action;
use App\Models\Clockstop;
use App\Models\Osticket;
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
    public function run() {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        // Site::factory(4000)->create();
        // Osticket::factory(1000)->create();
        // Action::factory(4000)->create();
        // Clockstop::factory(1500)->create();
    }
}
