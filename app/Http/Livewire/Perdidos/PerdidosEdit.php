<?php

namespace App\Http\Livewire\Perdidos;

use App\Models\adopcion\Mascota;
use App\Models\Image;
use App\Models\perdido\Perdido;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class PerdidosEdit extends Component
{
    public $mascota;
    public $especies,$sexos,$tamaños,$estados,$municipios,$op,$direccion, $estatus = [Mascota::Publicado => 'Publicado', Mascota::Adoptado => 'Adoptado'];
    protected $listeners = ['render' => 'render', 'deleteImage', 'refreshMascota'];


    public function mount(Perdido $mascota)
    {
        $this->mascota = $mascota;
        $this->fill([
            'especies' => ['Perro' => 'Perro', 'Gato' => 'Gato', 'Conejo' => 'Conejo'],
            'sexos'=>['Macho' => 'Macho',
                'Hembra' => 'Hembra'],
            'tamaños'=>[
                'Mini' => 'Mini',
                'Pequeño' => 'Pequeño',
                'Mediano' => 'Mediano',
                'Grande' => 'Grande',
                'Gigante' => 'Gigante'],
            'estados'=>['Campeche' => 'Campeche'],
            'municipios'=>[
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
                'Tenabo' => 'Tenabo'],
            'op'=>[
                'Si' => 'Si',
                'No' => 'No',
                'Desconocido' => 'Desconocido'],
            'direccion'=>$this->mascota->localizacione->Direccion,
            ]);
    }
    protected $rules = [
        'mascota.Especie' => 'required',
        'mascota.Sexo' => 'required',
        'mascota.Peso' => 'required',
        'mascota.Tamaño' => 'required',
        'mascota.Descripcion' => 'required',
        'mascota.Sarna' => 'required',
        'mascota.Heridas' => 'required',
        'mascota.Sano' => 'required',
        'mascota.Estatus' => 'required',
        'mascota.localizacione.Estado' => 'required',
        'mascota.localizacione.Municipio' => 'required',
        'mascota.localizacione.Direccion' => 'string'
    ];

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

    public function save()
    {
        //$out = new \Symfony\Component\Console\Output\ConsoleOutput();
        //$out->writeln($mascota);
        $this->validate();
        $this->mascota->save();
        $this->mascota->localizacione->save();
        redirect()->route('perdido.edit', $this->mascota);
    }

    public function render()
    {
        return view('livewire.perdidos.perdidos-edit',$this->mascota);
    }
}
