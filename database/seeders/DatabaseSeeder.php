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
        $this->call(EntregaSeeder::class);
        $this->call(EnfermedadeSeeder::class);
        $this->call(AptitudeSeeder::class);
    }
}
