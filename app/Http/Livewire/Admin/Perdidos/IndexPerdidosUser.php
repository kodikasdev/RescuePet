<?php

namespace App\Http\Livewire\Admin\Perdidos;

use App\Models\perdido\Perdido;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPerdidosUser extends Component
{
    use WithPagination;

    public function render()
    {
        $mascotas = Perdido::where('user_id', Auth::user()->id)->get();

        return view('livewire.admin.perdidos.index-perdidos', compact('mascotas'));
    }
}
