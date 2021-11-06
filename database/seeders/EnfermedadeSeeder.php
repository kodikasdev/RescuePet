<?php

namespace Database\Seeders;

use App\Models\adopcion\Enfermedade;
use Illuminate\Database\Seeder;

class EnfermedadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enfermedades = [
            [
                'Dato' => 'Tengo alergias'
            ],
            [
                'Dato' => 'Estoy en tratamiento médico'
            ],
            [
                'Dato' => 'Soy positivo en Leishmania'
            ],
            [
                'Dato' => 'Soy positivo en Inmunodeficiencia Felina'
            ],
            [
                'Dato' => 'Soy positivo en Leucemia'
            ],
            [
                'Dato' => 'Necesito licencia PPP'
            ],
        ];

        foreach ($enfermedades as $enfermedad){
            Enfermedade::create($enfermedad);
        }
    }
}
