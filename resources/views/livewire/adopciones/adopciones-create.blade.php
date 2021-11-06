<div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                {!! Form::open() !!}

                <div class="p-10">
                    <h3>1. Datos</h3>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="form-group col-span-6 sm:col-span-2">
                            {!! Form::label(null, 'Nombre', null) !!}
                            {!! Form::text('Nombre', null, ['wire:model' => 'Nombre', 'required']) !!}
                        </div>
                        <div class="form-group col-span-6 sm:col-span-2">
                            {!! Form::label(null, 'Especie', null) !!}
                            {!! Form::select('Especie', $especies, null, ['wire:model' => 'Especie', 'required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6 sm:col-span-2">
                            {!! Form::label(null, 'Raza', null) !!}
                            {!! Form::text('Raza', null, ['wire:model' => 'Raza', 'required']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Sexo', null) !!}
                            {!! Form::select('Sexo', $sexos, null, ['wire:model' => 'Sexo', 'required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Nacimiento', null) !!}
                            {!! Form::date('Nacimiento', null, ['wire:model' => 'Nacimiento', 'required']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Edad', null) !!}
                            {!! Form::select('Edad', $edades, null, ['wire:model' => 'Edad', 'required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Peso', null) !!}
                            {!! Form::number('Peso', null, ['wire:model' => 'Peso', 'required']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Tamaño', null) !!}
                            {!! Form::select('Tamaño', $tamaños, null, ['wire:model' => 'Tamaño', 'required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-6 lg:col-span-3">
                            {!! Form::label(null, 'Descripción', null) !!}
                            {!! Form::textarea('Descripcion', null, ['wire:model' => 'Descripcion', 'required']) !!}
                        </div>
                    </div>

                    <h3>2. Localización</h3>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="form-group col-span-6 md:col-span-3">
                            {!! Form::label(null, 'Estado', null) !!}
                            {!! Form::select('Estado', $estados, null, ['wire:model' => 'Estado',  'required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-3">
                            {!! Form::label(null, 'Municipio', null) !!}
                            {!! Form::select('Municipio', $municipios, null, ['wire:model' => 'Municipio',  'required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6">
                            {!! Form::label(null, 'Dirección', null) !!}
                            {!! Form::text('Direccion', null, ['wire:model' => 'Direccion',  'required']) !!}
                        </div>
                    </div>

                    <h3>3. Se entrega</h3>

                    <div class="grid grid-cols-6 gap-6">
                        @foreach ($entregas as $entrega)
                        <div class="col-span-6 lg:col-span-2 form-checkbox">
                            {!! Form::checkbox('Entregas[]', $entrega->id, null, ['wire:model' => 'Entregas']) !!}
                            {!! Form::label(null, $entrega->Dato, ['form-group']) !!}
                        </div>
                        @endforeach
                    </div>

                    <h3>4. Comportamiento</h3>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="form-group col-span-6 lg:col-span-2 md:col-span-3">
                            {!! Form::label(null, '¿Bueno con otros de su especie?', null) !!}
                            {!! Form::select('Otros', $OOtros, null, ['wire:model' => 'Otros', 'required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6 lg:col-span-2 md:col-span-3">
                            {!! Form::label(null, 'Comportamiento con extraños', null) !!}
                            {!! Form::select('Extraños', $OExtraños, null, ['wire:model' => 'Extraños', 'required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6 lg:col-span-2 md:col-span-3">
                            {!! Form::label(null, '¿Es ruidoso?', null) !!}
                            {!! Form::select('Ruidoso', $ORuidoso, null, ['wire:model' => 'Ruidoso', 'required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        @foreach ($aptitudes as $aptitud)
                            <div class="col-span-6 md:col-span-2 form-checkbox">
                                <label>
                                    {!! Form::checkbox('Aptitudes[]', $aptitud->id, null, ['wire:model' => 'Aptitudes']) !!}
                                    {{$aptitud->Dato}}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <h3>5. Enfermedades</h3>
                    <div class="grid grid-cols-6 gap-6">
                        @foreach ($enfermedades as $enfermedad)
                        <div class="col-span-6 lg:col-span-2 form-checkbox">
                            {!! Form::checkbox('Enfermedades[]', $enfermedad->id, null, ['wire:model' => 'Enfermedades']) !!}
                            {!! Form::label(null, $enfermedad->Dato, null) !!}
                        </div>
                        @endforeach
                    </div>


                    <div class="py-5">
                        <x-jet-button type="submit" wire:click="store()">
                            Guardar
                        </x-jet-button>
                    </div>

                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
