<?php

namespace App\Http\Livewire\Perdidos;

use App\Models\Image;
use App\Models\perdido\Perdido;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class PerdidosEdit extends Component
{
    public $mascota;

    protected $listeners = ['render' => 'render', 'deleteImage', 'refreshMascota'];

    public function mount(Perdido $mascota)
    {

        $this->mascota = $mascota;
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
        return view('livewire.perdidos.perdidos-edit');
    }
}
