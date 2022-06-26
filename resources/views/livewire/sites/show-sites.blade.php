<div wire:init="loadSites">
    <!-- Al cargar el formulario, llama a la funcion loadUser() = $this->readyToLoad=true; -->
    <span class="bg-amber-300">LISTADO DE LOCALES </span> 
    <x-table>

        <!--Elemento para mostrar lista de registros, barra de busqueda y boton (objeto) para creacion-->
        <div class="px-4 pb-4 flex items-center">
            <div class="flex items-center">
                <span>Mostrar</span>
                <select wire:model="cant" class="mx-2 form-control">
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="500">500</option>
                </select>
                <span>entradas</span>
            </div>
            <x-jet-input type="text" wire:model="search" class="flex-1 mx-4" placeholder="buscar..." />
            @can('sites.create')
                @livewire('sites.create-sites')
            @endcan
        </div>


        <!--No muestra registros si no existen en la tabla-->
        @if (count($sites))
            <table class="min-w-full leading-normal">
                <thead>
                    <!--cabecera de tabla-->
                    <tr>
                        <th class=" w-[100px] cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            wire:click="order('localid')"> <!--asocia la funcion order a la cabecera-->
                            ID
                            <!--Permite definir el comportamiento de los iconos segun el orden de la tabla-->
                            @if ($sort == 'localid')
                                @if ($direcion == 'asc')
                                    <i class="  fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>

                        <th class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            wire:click="order('zonal')">
                            Zonal
                            @if ($sort == 'zonal')
                                @if ($direcion == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>

                        <th class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            wire:click="order('nombre')">
                            Nombre
                            @if ($sort == 'nombre')
                                @if ($direcion == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>

                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Tipo
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Clasific
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Tipo
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Estado
                        </th>                        <!--PERMISO DE VISUALIZACION PARA LAS CONFIGURACIONES A USUARIOS CUYO ROL PERMITA USERS.EDIT-->
                        @can('sites.create')
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Config
                            </th>
                        @endcan
                    </tr>
                </thead>

                <!-- Registros de la tabla-->
                <tbody>
                    <!-- Iteracion a traves del variable SITES recibida desde el SHOWSITES-->
                    <!-- Se traslada al bucle a travez de la variable item-->
                    @foreach ($sites as $item)
                        <tr>
                            <td class="w-[75px] px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $item->localid }}</p>
                            </td>

                            <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $item->zonal }}</p>
                            </td>

                            <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $item->nombre }}</p>
                            </td>

                            <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $item->tipolocal }}</p>
                            </td>

                            <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $item->clasificacion }}</p>
                            </td>

                            <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                @switch($item->prioridad)
                                    @case('BLACK')
                                        @break
                                        @case('CLASICO')
                                            <div class="mx-4 flex place-content-center text-xs font-bold bg-orange-300 text-gray-900 whitespace-no-wrap"><p>{{ $item->prioridad }}</p></div>
                                        @break

                                        @case('ORO')
                                            <div class="mx-4 flex place-content-center text-xs font-bold bg-yellow-300 text-gray-900 whitespace-no-wrap"><p>{{ $item->prioridad }}</p></div>
                                        @break

                                        @case('PLATA')
                                            <div class="mx-4 flex place-content-center text-xs font-bold bg-stone-300 text-gray-900 whitespace-no-wrap"><p>{{ $item->prioridad }}</p></div>
                                        @break

                                        @case('BLACK')
                                            <div class="mx-4 flex place-content-center text-xs font-bold bg-stone-800 text-gray-100 whitespace-no-wrap"><p>{{ $item->prioridad }}</p></div>
                                        @break
                                    @default
                                @endswitch
                            </td>

                            <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                @if ($item->estado == "ACTIVO")
                                    <img class="object-fill h-8 w-16" src="/img/activeicon.png" alt="">
                                @else
                                    <img class="object-fill h-8 w-16" src="/img/inactiveicon.png" alt="">
                                @endif
                            </td>

                            <!--Asignacion de permiso para edicion-->
                            @can('sites.destroy')
                                <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                <!-- si el componente fuera exteno como el de creacion, usar (arroba)livewire para invocarlo, junto con los parametros --->
                                <!-- ['site' => $item], key($item->id)) -->
                                <!-- Llama a la funcion EDIT declarada en showusers -->
                                    <a class="btn btn-green" href="{{ route('sites.edit', $item) }}">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                    <!-- En vez de llamar a una funcion, emite una alerta de sweetalert2 definida al final de la hoja -->
                                    <a class="btn btn-red ml-2" wire:click="$emit('deleteSite', {{ $item->id }})">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Condicional para mostrar paginacion en caso haya registros-->
            @if ($sites->hasPages())
                <div class="px-6 py-3">
                    {{ $sites->links() }}
                </div>
            @endif
        @else
            <!--wire:loading.remove oculta un elemento durante la carga-->
            <div wire:loading.remove class="px-6 py-4 ">
                No existen registros
            </div>
        @endif
    </x-table>
    
    <div class="flex justify-center">
        <img wire:loading src="{{ asset('img/loading.gif') }}" class="w-30 p-5">
    </div>

    <!-- script que se pasa a app.blade.php para mensaje de confirmacion de borrado-->
    <!-- si se acepta, emite al formulario show.users(por ende, al controlador ShowXxxxx) y ejecuta funcion delente con el id asociado-->
    @push('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- $site->id -->
        <script>
            livewire.on('deleteSite', siteId => {
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "El registro se borarrá permanentemente",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, borrar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        livewire.emitTo('sites.show-sites', 'delete', siteId);
                        Swal.fire(
                            'Hecho!',
                            'El registro fue eliminado',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush
</div>
