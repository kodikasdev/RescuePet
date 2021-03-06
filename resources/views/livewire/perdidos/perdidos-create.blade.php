<div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {!! Form::open()!!}
                <div class="p-10">
                    <h3>1. Datos</h3>
                    <div class="grid grid-cols-6 gap-6">

                        <div class="form-group col-span-6 sm:col-span-2">
                            {!! Form::label(null, 'Especie', null) !!}
                            {!! Form::select('Especie', $especies, null, ['wire:model' => 'Especie', 'required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>

                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Sexo', null) !!}
                            {!! Form::select('Sexo', $sexos, null, ['wire:model' => 'Sexo', 'required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>

                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Peso', null) !!}
                            {!! Form::number('Peso', null, ['wire:model' => 'Peso', 'required']) !!}
                        </div>

                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Tamaño', null) !!}
                            {!! Form::select('Tamaño', $tamaños, null, ['wire:model' => 'Tamaño', 'required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>

                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Sarna', null) !!}
                            {!! Form::select('Sarna', $op, null, ['wire:model' => 'Sarna', 'required', 'placeholder' => 'Selecciona una opción']) !!}

                        </div>

                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Herido', null) !!}
                            {!! Form::select('Herido', $op, null, ['wire:model' => 'Heridas', 'required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>

                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Sano', null) !!}
                            {!! Form::select('Sano', $op, null, ['wire:model' => 'Sano', 'required', 'placeholder' => 'Selecciona una opción']) !!}
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
                            {!! Form::label(null, 'direccion ubicado', null) !!}
                            {!! Form::text('Direccion', null, ['wire:model' => 'Direccion',  'required']) !!}
                        </div>
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
