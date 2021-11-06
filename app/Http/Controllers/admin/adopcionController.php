<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\adopcion\Mascota;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adopcionController extends Controller
{

    public function files(Mascota $mascota, Request $request)
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
