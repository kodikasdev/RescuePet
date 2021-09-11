<?php

namespace Database\Factories\adopcion;

use App\Models\adopcion\Mascota;
use Illuminate\Database\Eloquent\Factories\Factory;

class MascotaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mascota::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Nombre' => $this->faker->name,
            'Especie' => $this->faker->randomElement(['Perro', 'Gato']),
            'Estatus' => $this->faker->randomElement(['En adopción']),
            'Raza' => $this->faker->randomElement(['Criollo', 'PUG']),
            'Sexo' => $this->faker->randomElement(['Macho', 'Hembra']),
            'Nacimiento' => $this->faker->date,
            'Edad' => $this->faker->randomElement(['Cachorro', 'Joven', 'Adulto']),
            'Peso' => $this->faker->randomElement(['2', '3', '4', '5', '6']),
            'Tamaño' => $this->faker->randomElement(['Mini', 'Pequeño', 'Mediano', 'Grande', 'Gigante']),
            'Descripcion' => $this->faker->word
        ];
    }
}
