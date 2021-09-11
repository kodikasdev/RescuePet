<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-10">
        <div class=" bg-white overflow-hidden shadow-2xl sm:rounded-lg">
            <div class="grid grid-cols-8 gap-2 p-3">
                <div class="form-group col-span-8 sm:col-span-2">
                    {!! Form::label('$for', 'Especie', null) !!}
                    {!! Form::select('Especie', $especies, null, ['wire:model' => 'filterEspecie', 'placeholder' => 'Selecciona']) !!}
                </div>
                <div class="form-group col-span-8 sm:col-span-2">
                    {!! Form::label('$for', 'Sexo', null) !!}
                    {!! Form::select('Sexo', $sexos, null, ['wire:model' => 'filterSexo', 'placeholder' => 'Selecciona']) !!}
                </div>
                <div class="form-group col-span-8 sm:col-span-2">
                    {!! Form::label('$for', 'Edad', null) !!}
                    {!! Form::select('Edad', $edades, null, ['wire:model' => 'filterEdad', 'placeholder' => 'Selecciona']) !!}
                </div>
                <div class="form-group col-span-8 sm:col-span-2">
                    {!! Form::label('$for', 'Tamaño', null) !!}
                    {!! Form::select('Tamaño', $tamaños, null, ['wire:model' => 'filterTamaño', 'placeholder' => 'Selecciona']) !!}
                </div>
            </div>
        </div>

        <div class="grid grid-cols-6 gap-2 py-3">
            @if ($mascotas->count())
                @foreach ($mascotas as $mascota)
                    <a href="" class="col-span-3 sm:col-span-3 md:col-span-2 lg:col-span-1 py-2">
                        <div class="card">
                            <div>
                                <img src="/media/img_adopta.jpg">
                            </div>
                            <div class="card-description">
                                <div>{{$mascota->Nombre}}</div>
                                <div>{{$mascota->Especie}}</div>
                            </div>
                            <div class="card-footer">
                                ADOPTAR
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <div class="col-span-6 bg-red-700 text-2xl text-white text-center font-extrabold p-1 rounded-lg">
                    NO EXISTE NINGUN REGISTRO
                </div>
            @endif
        </div>

        @if ($mascotas->haspages())
        <div class="p-3">
            {{$mascotas->links()}}
        </div>
    @endif
    </div>
</div>
