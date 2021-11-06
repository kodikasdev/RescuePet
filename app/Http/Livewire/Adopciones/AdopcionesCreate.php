<?php

namespace App\Http\Livewire\Adopciones;

use App\Models\adopcion\Aptitude;
use App\Models\adopcion\Enfermedade;
use App\Models\adopcion\Entrega;
use App\Models\adopcion\Mascota;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdopcionesCreate extends Component
{
    public $especies, $sexos, $edades, $tamaños, $estados, $municipios, $entregas, $OOtros, $OExtraños, $ORuidoso, $aptitudes, $enfermedades;

    public $Nombre, $Especie, $Raza, $Sexo, $Nacimiento, $Edad, $Peso, $Tamaño, $Descripcion, $Estado, $Municipio, $Direccion, $Entregas=[], $Otros, $Extraños, $Ruidoso, $Aptitudes=[], $Enfermedades=[];

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

        $this->estados = $estados = [
            'Campeche' => 'Campeche',
        ];

        $this->municipios = $municipios = [
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
            'Seyvaplaya' => 'Seyvaplaya',
            'Tenabo' => 'Tenabo',
        ];

        $this->OOtros = $OOtros = [
            'Desconocido' => 'Desconocido',
            'Bueno solo con machos' => 'Bueno solo con machos',
            'Bueno solo con hembras' => 'Bueno solo con hembras',
            'Bueno con otros de su especie' => 'Bueno con otros de su especie',
        ];

        $this->OExtraños = $OExtraños = [
            'Desconocido' => 'Desconocido',
            'Cauteloso con extraños' => 'Cauteloso con extraños',
            'Amigable con extraños' => 'Amigable con extraños',
            'Protector con extraños' => 'Protector con extraños',
            'Agresivo con extraños' => 'Agresivo con extraños',
        ];

        $this->ORuidoso = $ORuidoso = [
            'Desconocido' => 'Desconocido',
            'No ladro, no maúllo...' => 'No ladro, no maúllo...',
            'A veces ladro, maúllo...' => 'A veces ladro, maúllo...',
            'Ladro, maúllo... mucho' => 'Ladro, maúllo.. mucho',
        ];

        $this->entregas = Entrega::all();

        $this->aptitudes = Aptitude::all();

        $this->enfermedades = Enfermedade::all();
    }

    public function store()
    {
        $mascota = Mascota::create([
            'Nombre' => $this->Nombre,
            'Especie' => $this->Especie,
            'Raza' => $this->Raza,
            'Sexo' => $this->Sexo,
            'Nacimiento' => $this->Nacimiento,
            'Edad' => $this->Edad,
            'Peso' => $this->Peso,
            'Tamaño' => $this->Tamaño,
            'Descripcion' => $this->Descripcion,
        ]);


        $mascota->localizacione()->create([
            'Estado' => $this->Estado,
            'Municipio' => $this->Municipio,
            'Direccion' => $this->Direccion,
        ]);

        if ($this->Entregas != null) {
            foreach ($this->Entregas as $i=>$Entregas) {
                $mascota->entregas()->attach([
                    'Dato' => $this->Entregas[$i]
                ]);
            }
        }

        if ($this->Aptitudes != null) {
            foreach ($this->Aptitudes as $i=>$Aptitudes) {
                $mascota->aptitudes()->attach([
                    'Dato' => $this->Aptitudes[$i]
                ]);
            }
        }

        $mascota->comportamiento()->create([
            'Otros' => $this->Otros,
            'Extraños' => $this->Extraños,
            'Ruidoso' => $this->Ruidoso,
        ]);

        if ($this->Enfermedades != null) {
            foreach ($this->Enfermedades as $i=>$Enfermedades) {
                $mascota->enfermedades()->attach([
                    'Dato' => $this->Enfermedades[$i]
                ]);
            }
        }


        return redirect()->route('adopcion.edit', $mascota);
    }

    public function render()
    {
        return view('livewire.adopciones.adopciones-create');
    }
}
