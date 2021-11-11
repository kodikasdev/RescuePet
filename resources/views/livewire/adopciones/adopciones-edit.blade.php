<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-5" wire:ignore>
            <form action="{{route('adopcion.files', $mascota)}}"
                method="POST"
                class="dropzone"
                id="my-great-dropzone">
            </form>
        </div>

        @if ($mascota->images)
            <section class="bg-white shadow-xl rounded-lg p-5 dark:bg-gray-800">
                <h1 class="text-2xl text-center font-semibold mb-2 dark:text-gray-300">
                    Imagenes de la mascota
                </h1>
                <ul class="flex flex-wrap">
                    @foreach ($mascota->images as $image)
                        <li class="relative" wire:key="image-{{$image->id}}">
                            <img class="w-32 h-20 object-cover" src="{{Storage::url($image->url)}}" alt="">
                            <x-jet-danger-button class="absolute right-2 top-2"
                                wire:click="$emit('destroy', {{$image->id}})">
                                x
                            </x-jet-danger-button>
                        </li>
                    @endforeach
                </ul>
            </section>
        @endif
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {!! Form::open() !!}

                <div class="p-10">

                    <h3>1. Datos</h3>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="form-group col-span-6 sm:col-span-2">
                            {!! Form::label(null, 'Nombre', null) !!}
                            {!! Form::text('Nombre', null, ['wire:model' => 'mascota.Nombre', 'required']) !!}
                        </div>
                        <div class="form-group col-span-6 sm:col-span-2">
                            {!! Form::label(null, 'Especie', null) !!}
                            {!! Form::select('Especie', $especies, null, ['wire:model' => 'mascota.Especie', 'required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6 sm:col-span-2">
                            {!! Form::label(null, 'Raza', null) !!}
                            {!! Form::text('Raza', null, ['wire:model' => 'mascota.Raza', 'required']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Sexo', null) !!}
                            {!! Form::select('Sexo', $sexos, null, ['wire:model' => 'mascota.Sexo', 'required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Nacimiento', null) !!}
                            {!! Form::date('Nacimiento', null, ['wire:model' => 'mascota.Nacimiento', 'required']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Edad', null) !!}
                            {!! Form::select('Edad', $edades, null, ['wire:model' => 'mascota.Edad', 'required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Peso', null) !!}
                            {!! Form::number('Peso', null, ['wire:model' => 'mascota.Peso', 'required']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Tamaño', null) !!}
                            {!! Form::select('Tamaño', $tamaños, null, ['wire:model' => 'mascota.Tamaño', 'required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-6 lg:col-span-3">
                            {!! Form::label(null, 'Descripción', null) !!}
                            {!! Form::textarea('Descripcion', null, ['wire:model' => 'mascota.Descripcion', 'required']) !!}
                        </div>
                    </div>

                    <h3>2. Localización</h3>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="form-group col-span-6 md:col-span-3">
                            {!! Form::label(null, 'Estado', null) !!}
                            {!! Form::select('Estado', $estados, null, ['wire:model' => 'localizacione.Estado',  'required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-3">
                            {!! Form::label(null, 'Municipio', null) !!}
                            {!! Form::select('Municipio', $municipios, null, ['wire:model' => 'localizacione.Municipio',  'required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6">
                            {!! Form::label(null, 'Dirección', null) !!}
                            {!! Form::text('Direccion', null, ['wire:model' => 'localizacione.Direccion',  'required']) !!}
                        </div>
                    </div>

                    <h3>3. Se entrega</h3>
                    <div class="grid grid-cols-6 gap-6">
                        @foreach ($entregas as $entrega)
                        <div class="col-span-6 lg:col-span-2 form-checkbox">
                            {!! Form::checkbox($name, $value, $checked, [$options]) !!}
                            {!! Form::checkbox('Entregas[]', $entrega->id, null, ['wire:model' => 'Dato']) !!}
                            {!! Form::label(null, $entrega->Dato, ['form-group']) !!}
                        </div>
                        @endforeach
                    </div>

                    <h3>4. Comportamiento</h3>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="form-group col-span-6 lg:col-span-2 md:col-span-3">
                            {!! Form::label(null, '¿Bueno con otros de su especie?', null) !!}
                            {!! Form::select('Otros', $OOtros, null, ['wire:model' => 'comportamiento.Otros', 'required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6 lg:col-span-2 md:col-span-3">
                            {!! Form::label(null, 'Comportamiento con extraños', null) !!}
                            {!! Form::select('Extraños', $OExtraños, null, ['wire:model' => 'comportamiento.Extraños', 'required', 'placeholder' => 'Selecciona una opción']) !!}
                        </div>
                        <div class="form-group col-span-6 lg:col-span-2 md:col-span-3">
                            {!! Form::label(null, '¿Es ruidoso?', null) !!}
                            {!! Form::select('Ruidoso', $ORuidoso, null, ['wire:model' => 'comportamiento.Ruidoso', 'required', 'placeholder' => 'Selecciona una opción']) !!}
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

    @push('js')
        <script>
            Livewire.on('destroy', item => {
                Swal.fire({
                    title: '¿Está seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Si, bórralo!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('adopciones.adopciones-edit', 'deleteImage', item)
                        Swal.fire(
                        '¡Eliminado!',
                        'Su imagen ha sido eliminado.',
                        'success'
                        )
                    }
                })
            })
        </script>
        <script>
            Dropzone.options.myGreatDropzone = {
                headers: {
                    'X-CSRF-TOKEN' : "{{ csrf_token()}}"
                },
                dictDefaultMessage: "Arrastre sus imagenes al recuadro",
                acceptFiles: 'image/*',
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                complete: function(file) {
                    this.removeFile(file)
                },
                queuecomplete: function() {
                    Livewire.emit('refreshMascota')
                }
            };
        </script>
    @endpush
</div>
