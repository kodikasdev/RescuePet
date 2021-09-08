<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {!! Form::open(['route' => 'adopcion.store']) !!}
                <div class="p-10">
                    <h3>1. Datos</h3>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="form-group col-span-6 sm:col-span-2">
                            {!! Form::label(null, 'Nombre', null) !!}
                            {!! Form::text('Nombre', null, ['required']) !!}
                        </div>
                        <div class="form-group col-span-6 sm:col-span-2">
                            {!! Form::label(null, 'Especie', null) !!}
                            {!! Form::select('Especie', $especies, null, ['required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6 sm:col-span-2">
                            {!! Form::label(null, 'Raza', null) !!}
                            {!! Form::text('Raza', null, ['required']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Sexo', null) !!}
                            {!! Form::select('Sexo', $sexos, null, ['required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Nacimiento', null) !!}
                            {!! Form::date('Nacimiento', null, ['required']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Edad', null) !!}
                            {!! Form::select('Edad', $edades, null, ['required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Peso', null) !!}
                            {!! Form::number('Peso', null, ['required']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Tamaño', null) !!}
                            {!! Form::select('Tamaño', $tamaños, null, ['required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-6 lg:col-span-3">
                            {!! Form::label(null, 'Descripción', null) !!}
                            {!! Form::textarea('Descripcion', null, null) !!}
                        </div>
                    </div>

                    <h3>2. Localización</h3>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="form-group col-span-6 md:col-span-3">
                            {!! Form::label(null, 'Estado', null) !!}
                            {!! Form::select('Estado', $estados, null, ['required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-3">
                            {!! Form::label(null, 'Municipio', null) !!}
                            {!! Form::select('Municipio', $municipios, null, ['required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6">
                            {!! Form::label(null, 'Dirección', null) !!}
                            {!! Form::text('Direccion', null, ['required']) !!}
                        </div>
                    </div>

                    <h3>3. Se entrega</h3>
                    <div class="grid grid-cols-6 gap-6">
                        @foreach ($entregas as $item)
                        <div class="col-span-6 lg:col-span-2">
                            {!! Form::checkbox('Entregas[]', $item, null) !!}
                            {!! Form::label(null, $item, ['form-group']) !!}
                        </div>
                        @endforeach
                    </div>

                    <h3>4. Comportamiento</h3>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="form-group col-span-6 lg:col-span-2 md:col-span-3">
                            {!! Form::label(null, '¿Bueno con otros de su especie?', null) !!}
                            {!! Form::select('Otros', $OOtros, null, ['required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6 lg:col-span-2 md:col-span-3">
                            {!! Form::label(null, 'Comportamiento con extraños', null) !!}
                            {!! Form::select('Extraños', $OExtraños, null, ['required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6 lg:col-span-2 md:col-span-3">
                            {!! Form::label(null, '¿Es ruidoso?', null) !!}
                            {!! Form::select('Ruidoso', $ORuidoso, null, ['required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        @foreach ($aptitudes as $aptitud)
                            <div class="col-span-6 md:col-span-2">
                                <label>
                                    {!! Form::checkbox('Dato', $aptitud, null, null) !!}
                                    {{$aptitud}}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <h3>5. Enfermedades</h3>
                    <div class="grid grid-cols-6 gap-6">
                        @foreach ($entregas as $item)
                        <div class="col-span-6 lg:col-span-1">
                            {!! Form::checkbox('Enfermedades[]', $item, null) !!}
                            {!! Form::label(null, $item, null) !!}
                        </div>
                        @endforeach
                    </div>
                </div>

                {!! Form::submit('GUARDAR', ['class' => 'btn btn-blue']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>
