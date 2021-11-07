<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {!! Form::open(['route' => 'perdido.store']) !!}
                <div class="p-10">
                    <h3>1. Datos</h3>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="form-group col-span-6 sm:col-span-2">
                            {!! Form::label(null, 'Especie', null) !!}
                            {!! Form::select('Especie', $especies, null, ['required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6 sm:col-span-2">
                            {!! Form::label(null, 'Estatus', null) !!}
                            {!! Form::text('Raza', null, ['required']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Sexo', null) !!}
                            {!! Form::select('Sexo', $sexos, null, ['required', 'placeholder' => 'Selecciona una opción']) !!}
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
                        <div class="form-group col-span-6 md:col-span-6 lg:col-span-3">
                            {!! Form::label(null, 'Sarna', null) !!}
                            {!! Form::text('Sarna', null, ['required']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-6 lg:col-span-3">
                            {!! Form::label(null, 'Herido', null) !!}
                            {!! Form::text('Herido', null, ['required']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-6 lg:col-span-3">
                            {!! Form::label(null, 'Sano', null) !!}
                            {!! Form::text('Sano', null, ['required']) !!}
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
                            {!! Form::label(null, 'direccion ubicado', null) !!}
                            {!! Form::text('Direccion', null, ['required']) !!}
                        </div>
                    </div>

                    <div class="py-5">
                        <x-jet-button type="Submit">
                            Guardar
                        </x-jet-button>
                    </div>

                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>
