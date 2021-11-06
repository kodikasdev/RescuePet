<?php

namespace Database\Seeders;

use App\Models\adopcion\Aptitude;
use Illuminate\Database\Seeder;

class AptitudeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aptitudes = [
            [
                'Dato' => 'Bueno con gatos'
            ],
            [
                'Dato' => 'Bueno con otros animales'
            ],
            [
                'Dato' => 'Bueno con niños'
            ],
            [
                'Dato' => 'Bueno en el coche'
            ],
            [
                'Dato' => 'Bueno en casa'
            ],
            [
                'Dato' => 'Protector'
            ],
            [
                'Dato' => 'Escapista'
            ],
            [
                'Dato' => 'Me gusta pasear'
            ],
            [
                'Dato' => 'Timido'
            ],
            [
                'Dato' => 'Independiente'
            ],
            [
                'Dato' => 'Me gusta estár en compañia'
            ],
            [
                'Dato' => 'Cariñoso'
            ],
            [
                'Dato' => 'Juguetón'
            ],
            [
                'Dato' => 'Dormilón'
            ],
            [
                'Dato' => 'Buen temperamento'
            ],
        ];

        foreach ($aptitudes as $aptitud){
            Aptitude::create($aptitud);
        }
    }
}
