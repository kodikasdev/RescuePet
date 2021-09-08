<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\adopcion\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adopciónController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        ];

        $tamaños = [
            'Mini' => 'Mini',
            'Mediano' => 'Mediano',
            'Grande' => 'Grande',
        ];

        $estados = [
            'Campeche' => 'Campeche',
        ];

        $municipios = [
            'Calkini' => 'Calkini',
            'Campeche' => 'Campeche',
            'Candelaria' => 'Candelaria',
            'Champotón' => 'Champotón',
            'Escarcega' => 'Escarcega',
            'Palizada' => 'Palizada',
        ];

        $OOtros = [
            'Desconocido' => 'Desconocido',
        ];

        $OExtraños = [
            'Desconocido' => 'Desconocido',
        ];

        $ORuidoso = [
            'Desconocido' => 'Desconocido',
        ];

        $entregas = [
            'Vacunado' => 'Vacunado',
            'Desparasitados' => 'Desparasitados',
            'Sano' => 'Sano',
            'Esterilizado' => 'Esterilizado'
        ];

        $aptitudes = [
            'Bueno con gatos',
            'Bueno con otros animales',
            'Bueno con niños'
        ];

        $enfermedades = [
            'Desconocido' => 'Desconocido',
        ];

        return  view('adopciones.adopciones_create', compact('especies', 'sexos', 'edades', 'tamaños', 'OOtros', 'OExtraños', 'ORuidoso', 'estados', 'municipios', 'entregas', 'aptitudes', 'enfermedades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use($request) {
            $mascota = Mascota::create($request->all());

            $mascota->localizacione()->create([
                'Estado' => $request['Estado'],
                'Municipio' => $request['Municipio'],
                'Direccion' => $request['Direccion'],
            ]);

            foreach ($request->Entregas as $i=>$Entregas) {
                $mascota->entregas()->create([
                    'Dato' => $request["Entregas"][$i]
                ]);
            }

            $mascota->comportamiento()->create([
                'Otros' => $request['Otros'],
                'Extraños' => $request['Extraños'],
                'Ruidoso' => $request['Ruidoso'],
            ]);

            foreach ($request->Enfermedades as $i=>$Enfermedades) {
                $mascota->enfermedades()->create([
                    'Enfermedad' => $request["Enfermedades"][$i]
                ]);
            }

        });

        return redirect()->route('adopcion.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
