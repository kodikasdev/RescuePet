<?php

namespace App\Http\Livewire\Adopciones;

use App\Models\adopcion\Aptitude;
use App\Models\adopcion\Comportamiento;
use App\Models\adopcion\Enfermedade;
use App\Models\adopcion\Entrega;
use App\Models\adopcion\Localizacione;
use App\Models\adopcion\Mascota;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AdopcionesEdit extends Component
{
    public $mascota, $localizacione, $comportamiento, $entrega = [];

    protected $rules = [
        'mascota.Nombre' => 'required',
        'mascota.Especie' => 'required',
        'mascota.Raza' => 'required',
        'mascota.Sexo' => 'required',
        'mascota.Nacimiento' => 'required',
        'mascota.Edad' => 'required',
        'mascota.Peso' => 'required',
        'mascota.Tamaño' => 'required',
        'mascota.Descripcion' => 'required',
        'localizacione.Estado' => 'required',
        'localizacione.Municipio' => 'required',
        'localizacione.Direccion' => 'required',
        'comportamiento.Otros' => 'required',
        'comportamiento.Extraños' => 'required',
        'comportamiento.Ruidoso' => 'required',
        'entrega.Dato' => 'required'

    ];

    public $especies, $sexos, $edades, $tamaños, $estados, $municipios, $entregas, $OOtros, $OExtraños, $ORuidoso, $aptitudes, $enfermedades;

    public $Otros, $Extraños, $Ruidoso, $Dato=[], $Enfermedades=[];

    protected $listeners = ['render' => 'render', 'deleteImage', 'refreshMascota'];

    public function mount(Mascota $mascota)
    {

        $this->mascota = $mascota;

        $this->localizacione = $mascota->localizacione()->first();
        $this->comportamiento = $mascota->comportamiento()->first();
        $this->entrega = $mascota->entregas;

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

    public function update()
    {
        # code...
    }

    public function deleteImage(Image $image)
    {
        Storage::delete([$image->url]);
        $image->delete();

        $this->mascota = $this->mascota->fresh();
    }

    public function refreshMascota()
    {
        $this->mascota = $this->mascota->refresh();
    }

    public function render()
    {

        return view('livewire.adopciones.adopciones-edit');
    }
}
