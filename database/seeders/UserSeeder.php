<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'name'=>'miguel mort',
            'email'=>'mortmr9@gmail.com',
            'password'=>bcrypt('12345678')
        ])->assignRole('Administrador');

        User::create([
            'name'=>'will',
            'email'=>'correo@correo.com',
            'password'=>bcrypt('12345678')
        ])->assignRole('Administrador');
    }
}
