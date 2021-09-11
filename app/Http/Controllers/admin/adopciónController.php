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
        return view('adopciones.adopciones_index');
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
            'Senior' => 'Senior',
        ];

        $tamaños = [
            'Mini' => 'Mini',
            'Pequeño' => 'Pequeño',
            'Mediano' => 'Mediano',
            'Grande' => 'Grande',
            'Gigante' => 'Gigante',
        ];

        $estados = [
            'Campeche' => 'Campeche',
        ];

        $municipios = [
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

        $entregas = [
            'Vacunado' => 'Vacunado',
            'Desparasitados' => 'Desparasitados',
            'Sano' => 'Sano',
            'Esterilizado' => 'Esterilizado',
            'Identificado' => 'Identificado',
            'Microchip' => 'Microchip',
        ];

        $OOtros = [
            'Desconocido' => 'Desconocido',
            'Bueno solo con machos' => 'Bueno solo con machos',
            'Bueno solo con hembras' => 'Bueno solo con hembras',
            'Bueno con otros de su especie' => 'Bueno con otros de su especie',
        ];

        $OExtraños = [
            'Desconocido' => 'Desconocido',
            'Cauteloso con extraños' => 'Cauteloso con extraños',
            'Amigable con extraños' => 'Amigable con extraños',
            'Protector con extraños' => 'Protector con extraños',
            'Agresivo con extraños' => 'Agresivo con extraños',
        ];

        $ORuidoso = [
            'Desconocido' => 'Desconocido',
            'No ladro, no maúllo...' => 'No ladro, no maúllo...',
            'A veces ladro, maúllo...' => 'A veces ladro, maúllo...',
            'Ladro, maúllo... mucho' => 'Ladro, maúllo.. mucho',
        ];


        $aptitudes = [
            'Bueno con gatos' => 'Bueno con gatos',
            'Bueno con otros animales' => 'Bueno con otros animales',
            'Bueno con niños' => 'Bueno con niños',
            'Bueno en el coche' => 'Bueno en el coche',
            'Bueno en casa' => 'Bueno en casa',
            'Protector' => 'Protector',
            'Escapista' => 'Escapista',
            'Me gusta pasear' => 'Me gusta pasear',
            'Timido' => 'Timido',
            'Independiente' => 'Independiente',
            'Me gusta estár en compañia' => 'Me gusta estár en compañia',
            'Cariñoso' => 'Cariñoso',
            'Juguetón' => 'Juguetón',
            'Dormilón' => 'Dormilón',
            'Buen temperamento' => 'Buen temperamento',
        ];

        $enfermedades = [
            'Tengo alergias' => 'Tengo alergias',
            'Estoy en tratamiento médico' => 'Estoy en tratamiento médico',
            'Soy positivo en Leishmania' => 'Soy positivo en Leishmania',
            'Soy positivo en Inmunodeficiencia Felina' => 'Soy positivo en Inmunodeficiencia Felina',
            'Soy positivo en Leucemia' => 'Soy positivo en Leucemia ',
            'Necesito licencia PPP' => 'Necesito licencia PPP',
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
