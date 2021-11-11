<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\perdido\Perdido;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class perdidosController extends Controller
{

    public function files(Perdido $mascota, Request $request)
    {
        $request->validate([
            'file' => 'required|image'
        ]);

        $url = Storage::put('public/mascotas', $request->file('file'));

        $mascota->images()->create([
            'url' => $url
        ]);
    }

}
