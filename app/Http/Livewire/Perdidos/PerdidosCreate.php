<?php

namespace App\Http\Livewire\Perdidos;

use App\Models\perdido\Perdido;
use Livewire\Component;

class PerdidosCreate extends Component
{
    public $especies, $sexos, $tamaños, $estados, $municipios, $entregas, $OOtros, $aptitudes, $enfermedades,$Estatus,$Sarna,$Heridas,$Sano;

    public $Nombre, $Especie, $Raza, $Sexo, $Nacimiento, $Edad, $Peso, $Tamaño, $Descripcion, $Estado, $Municipio, $Direccion, $Entregas=[], $Otros, $Ruidoso, $Aptitudes=[];

    public function mount()
    {
        $this->especies = [
            'Perro' => 'Perro',
            'Gato' => 'Gato',
            'Conejo' => 'Conejo'
        ];

        $this->sexos = [
            'Macho' => 'Macho',
            'Hembra' => 'Hembra'
        ];


        $this->tamaños = [
            'Mini' => 'Mini',
            'Pequeño' => 'Pequeño',
            'Mediano' => 'Mediano',
            'Grande' => 'Grande',
            'Gigante' => 'Gigante',
        ];

        $this->estados = [
            'Campeche' => 'Campeche',
        ];

        $this->municipios = [
            'Calakmul' => 'Calakmul',
            'Calkini' => 'Calkini',
            'Campeche' => 'Campeche',
            'Candelaria' => 'Candelaria',
            'Carmen' => 'Carmen',
            'Champotón' => 'Champotón',
            'Dzitbalché' => 'Dzitbalché',
            'Escárcega' => 'Escárcega',
            'Hecelchakán' => 'Hecelchakán',
            'Hopelchén' => 'Hopelchén',
            'Palizada' => 'Palizada',
            'Seybaplaya' => 'Seybaplaya',
            'Tenabo' => 'Tenabo',
        ];
    }

    public function store()
    {
        $mascota = Perdido::create([
            'Especie' => $this->Especie,
            'Estatus'=> $this->Estatus,
            'Sexo' => $this->Sexo,
            'Peso' => $this->Peso,
            'Tamaño' => $this->Tamaño,
            'Descripcion' => $this->Descripcion,
            'Sarna'=> $this->Sarna,
            'Heridas'=> $this->Heridas,
            'Sano'=> $this->Sano
        ]);


        $mascota->localizacione()->create([
            'Estado' => $this->Estado,
            'Municipio' => $this->Municipio,
            'Direccion' => $this->Direccion,
        ]);

        return redirect()->route('perdido.create');
    }
    public function render()
    {
        return view('livewire.perdidos.perdidos-create');
    }
}
