<?php

namespace Database\Seeders;

use App\Models\adopcion\Entrega;
use Illuminate\Database\Seeder;

class EntregaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entregas = [
            [
                'Dato' => 'Vacunado'
            ],
            [
                'Dato' => 'Desparasitados'
            ],
            [
                'Dato' => 'Sano'
            ],
            [
                'Dato' => 'Esterilizado'
            ],
            [
                'Dato' => 'Identificado'
            ],
            [
                'Dato' => 'Microchip'
            ],
        ];

        foreach ($entregas as $entrega){
            Entrega::create($entrega);
        }
    }
}
