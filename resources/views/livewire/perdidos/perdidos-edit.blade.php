<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-5">
            <form action="{{route('perdido.files', $mascota)}}"
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

        <div>
            {!! Form::open() !!}
                @csrf
                <div class="p-10">
                    <h3>1. Datos</h3>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="form-group col-span-6 sm:col-span-2">
                            {!! Form::label(null, 'Especie', null) !!}
                            {!! Form::select('Especie',$especies,null,['wire:model' => 'mascota.Especie', 'required']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Sexo', null) !!}
                            {!! Form::select('Sexo',$sexos,null,['wire:model' => 'mascota.Sexo', 'required']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Peso', null) !!}
                            {!! Form::number('Peso',null,['wire:model' => 'mascota.Peso', 'required']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Tama??o', null) !!}
                            {!! Form::select('Tama??o',$tama??os,null,['wire:model' => 'mascota.Tama??o', 'required']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Sarna', null) !!}
                            {!! Form::select('op',$op,null,['wire:model' => 'mascota.Sarna', 'required']) !!}

                        </div>
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Herido', null) !!}
                            {!! Form::select('op',$op,null,['wire:model' => 'mascota.Heridas', 'required']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Sano', null) !!}
                            {!! Form::select('op',$op,null,['wire:model' => 'mascota.Sano', 'required']) !!}
                        </div>
                        @can('perdidos.all')
                        <div class="form-group col-span-6 md:col-span-2 lg:col-span-1">
                            {!! Form::label(null, 'Estatus', null) !!}
                            {!! Form::select('op',$estatus,null,['wire:model' => 'mascota.Estatus', 'required']) !!}
                        </div>
                        @endcan
                        <div class="form-group col-span-6 md:col-span-6 lg:col-span-3">
                            {!! Form::label(null, 'Descripci??n', null) !!}
                            {!! Form::textarea('Descripcion',null,['wire:model' => 'mascota.Descripcion']) !!}
                        </div>

                    </div>

                    <h3>2. Localizaci??n</h3>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="form-group col-span-6 md:col-span-3">
                            {!! Form::label(null, 'Estado', null) !!}
                            {!! Form::select('Estado',$estados,null,['wire:model' => 'mascota.localizacione.Estado', 'required']) !!}
                        </div>
                        <div class="form-group col-span-6 md:col-span-3">
                            {!! Form::label(null, 'Municipio', null) !!}
                            {!! Form::select('Municipio',$municipios,null,['wire:model' => 'mascota.localizacione.Municipio','required']) !!}
                        </div>
                        <div class="form-group col-span-6">
                            {!! Form::label(null, 'direccion ubicado', null) !!}
                            {!! Form::text('Direccion',$direccion,['wire:model' => 'mascota.localizacione.Direccion','required']) !!}
                        </div>
                    </div>

                    <div class="py-5">
                        <x-jet-button type="submit" wire:click="save()">
                            Actualizar
                        </x-jet-button>
                    </div>

                </div>

            {!! Form::close() !!}
        </div>


    </div>


    @push('js')
        <script>
            Livewire.on('destroy', item => {
                Swal.fire({
                    title: '??Est?? seguro?',
                    text: "??No podr??s revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '??Si, b??rralo!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('perdidos.perdidos-edit', 'deleteImage', item)
                        Swal.fire(
                        '??Eliminado!',
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
