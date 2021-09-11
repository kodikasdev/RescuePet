<?php

namespace App\Http\Livewire\Admin;

use App\Models\adopcion\Mascota;
use Livewire\Component;
use Livewire\WithPagination;

class AdopcionIndex extends Component
{
    use WithPagination;

    public $filterEspecie, $filterSexo, $filterEdad, $filterTamaño;

    public function render()
    {

        $especies = [
            'Perro' => 'Perro',
            'Gato' => 'Gato',
            'Conejo' => 'Conejo'
        ];

        $sexos = [
            'Macho' => 'Macho',
            'Hembra' => 'Hembra'
        ];

        $edades = [
            'Cachorro' => 'Cachorro',
            'Joven' => 'Joven',
            'Adulto' => 'Adulto',
            'Senior' => 'Senior',
        ];

        $tamaños = [
            'Mini' => 'Mini',
            'Pequeño' => 'Pequeño',
            'Mediano' => 'Mediano',
            'Grande' => 'Grande',
            'Gigante' => 'Gigante',
        ];

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

        return view('livewire.admin.adopcion-index', compact('mascotas', 'especies', 'sexos', 'edades', 'tamaños'));
    }
}
