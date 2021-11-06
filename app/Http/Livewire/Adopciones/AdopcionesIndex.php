<?php

namespace App\Http\Livewire\Adopciones;

use App\Models\adopcion\Mascota;
use Livewire\Component;

class AdopcionesIndex extends Component
{
    public $filterEspecie, $filterSexo, $filterEdad, $filterTamaño;
    public $especies, $sexos, $edades, $tamaños;

    public function mount()
    {
        $this->especies = $especies = [
            'Perro' => 'Perro',
            'Gato' => 'Gato',
            'Conejo' => 'Conejo'
        ];

        $this->sexos = $sexos = [
            'Macho' => 'Macho',
            'Hembra' => 'Hembra'
        ];

        $this->edades = $edades = [
            'Cachorro' => 'Cachorro',
            'Joven' => 'Joven',
            'Adulto' => 'Adulto',
            'Senior' => 'Senior',
        ];

        $this->tamaños = $tamaños = [
            'Mini' => 'Mini',
            'Pequeño' => 'Pequeño',
            'Mediano' => 'Mediano',
            'Grande' => 'Grande',
            'Gigante' => 'Gigante',
        ];
    }

    public function render()
    {
        $mascotas = Mascota::where('Estatus', 'En adopción')
        ->when($this->filterEspecie, function($query){
            $query->where('Especie', $this->filterEspecie);
        })
        ->when($this->filterSexo, function($query){
            $query->where('Sexo', $this->filterSexo);
        })
        ->when($this->filterEdad, function($query){
            $query->where('Edad', $this->filterEdad);
        })
        ->when($this->filterTamaño, function($query){
            $query->where('Tamaño', $this->filterTamaño);
        })
        ->orderBy('id', 'desc')->paginate('18');

        return view('livewire.adopciones.adopciones-index', compact('mascotas'));
    }
}
