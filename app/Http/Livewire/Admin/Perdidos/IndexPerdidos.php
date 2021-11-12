<?php

namespace App\Http\Livewire\Admin\Perdidos;

use App\Models\perdido\Perdido;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPerdidos extends Component
{
    use WithPagination;

    public function render()
    {
        $mascotas = Perdido::paginate(20);

        return view('livewire.admin.perdidos.index-perdidos', compact('mascotas'));
    }
}
