<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-5" wire:ignore>
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
                        Livewire.emitTo('perdidos.perdidos-edit', 'deleteImage', item)
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
