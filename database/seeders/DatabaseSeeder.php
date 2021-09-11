<?php

namespace Database\Seeders;

use App\Models\adopcion\Mascota;
use Carbon\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        Mascota::factory(20)->create();
        // \App\Models\User::factory(10)->create();
    }
}
