<div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 py-10">
        <x-tables>
            <div class="flex items-center p-3">
                <div class="flex items-center px-1">
                    <span class="text-sm text-gray-900">Mostrar</span>
                    <select wire:model="paginate" class="mx-2 form-select">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="75">75</option>
                        <option value="100">100</option>
                    </select>
                    <span class="text-sm text-gray-900">Entradas</span>
                </div>
                <div class="flex flex-1  items-center mt-1">
                    <div class="pointer-events-none px-2 text-sm text-gray-900">
                        <i class="fas fa-search"></i>
                    </div>
                    <x-jet-input class="flex-1"
                    wire:model="search" type="text"
                    placeholder="Búsqueda rápida" required autofocus />
                </div>


                <x-jet-secondary-button wire:click="$set('filter', true)" class="mx-2 flex">
                    <i class="fas fa-filter"></i>
                </x-jet-secondary-button>
            </div>

            <table class="tables">
                <thead>
                    <th>Especie</th>
                    <th>Sexo</th>
                    <th>Peso</th>
                    <th>Tamaño</th>
                    <th>Estatus</th>
                    <th>

                    </th>
                </thead>
                <tbody>
                    @foreach ($mascotas as $mascota)
                    <tr>
                        <td>
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    @if ($mascota->images->count())
                                        <img class="h-10 w-10 rounded-full object-cover"
                                            src="{{Storage::url($mascota->images->first()->url)}}" alt="">
                                    @else
                                        <img class="h-10 w-10 rounded-full object-cover" src="/media/img_adopta.jpg">
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{$mascota->Especie}}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="text-sm text-gray-900 dark:text-gray-100">
                                {{$mascota->Sexo}}
                            </div>
                        </td>
                        <td>
                            <div class="text-sm text-gray-900 dark:text-gray-100">
                                {{$mascota->Peso}}
                            </div>
                        </td>
                        <td>
                            <div class="text-sm text-gray-900 dark:text-gray-100">
                                {{ $mascota->Tamaño}}
                            </div>
                        </td>
                        <td>
                            @switch($mascota->Estatus)
                                @case(1)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-800 text-white">
                                        Adoptado
                                    </span>
                                @break

                                @case(2)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">
                                        Publicado
                                    </span>
                                @break
                                @default
                            @endswitch
                        </td>
                        <td>
                            <x-btn-secondary href="" >
                                <i class="fas fa-edit"></i>
                            </x-btn-secondary>
                            <x-btn-secondary href="#" >
                                <i class="fas fa-eye"></i>
                            </x-btn-secondary>
                            <x-jet-secondary-button wire:click="$emit('destroy', {{$mascota->id}})">
                                <i class="fas fa-trash"></i>
                            </x-jet-secondary-button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!---
            <div class="p-3">
                {{--$mascotas->links()---}}
            </div>
            !!-->
        </x-tables>
    </div>
</div>
