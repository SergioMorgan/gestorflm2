<div class="max-w-7xl mx-auto sm:px-2 lg:px-4 py-4">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        <div wire:init="loadSites" ">
            <!-- Al cargar el formulario, llama a la funcion loadxxxx() = $this->readyToLoad=true; -->

            <div class="p-2 w-full flex justify-between bg-gray-800 text-white items-center">
                <span class="px-2 ">LISTADO DE LOCALES </span>
                @can('sites.create')
                    <x-jet-button wire:click="gotocreate" class="bg-blue-700">
                        Crear nuevo local
                    </x-jet-button>
                @endcan
            </div>

            <div class="p-2 flex items-center  bg-white text-gray-900">
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

            </div>


            <x-table>

                <!--No muestra registros si no existen en la tabla-->
                @if (count($sites))
                    <table class="min-w-full leading-normal text-xs">
                        <thead>
                            <!--cabecera de tabla-->
                            <tr class="bg-gray-300  text-gray-800">
                                <th class=" w-[100px] cursor-pointer px-5 py-3 border-b-2 border-gray-200 text-left uppercase tracking-wider"
                                    wire:click="order('localid')">
                                    <!--asocia la funcion order a la cabecera-->
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
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 text-left  uppercase tracking-wider">
                                    Estado
                                </th>
                                <th class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 text-left uppercase tracking-wider"
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
                                <th class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 text-left uppercase tracking-wider"
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
                                    class="px-5 py-3 border-b-2 border-gray-200 text-center uppercase tracking-wider">
                                    Tipo
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 text-center uppercase tracking-wider">
                                    SLA
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 text-center uppercase tracking-wider">
                                    Clasific
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 text-center uppercase tracking-wider">
                                    Config
                                </th>
                            </tr>
                        </thead>

                        <!-- Registros de la tabla-->
                        <tbody>
                            <!-- Iteracion a traves del variable SITES recibida desde el SHOWSITES-->
                            <!-- Se traslada al bucle a travez de la variable item-->
                            @foreach ($sites as $item)
                                <tr class="bg-white">
                                    <td class="w-[75px] px-3 py-3 border-b border-gray-200 text-center font-bold text-xs">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $item->localid }}</p>
                                    </td>
                                    <td class="px-3 py-3 border-b border-gray-200 text-center  text-xs">
                                        @switch($item->estado)
                                            @case('ACTIVO')
                                                <div
                                                    class="mx-4 flex place-content-center text-xs bg-green-300 text-gray-900 whitespace-no-wrap">
                                                    <p>{{ $item->estado }}</p>
                                                </div>
                                            @break
                                            @case('INACTIVO')
                                                <div
                                                    class="mx-4 flex place-content-center text-xs bg-red-300 text-gray-50 whitespace-no-wrap">
                                                    <p>{{ $item->estado }}</p>
                                                </div>
                                            @break
                                            @default
                                        @endswitch
                                    </td>
                                    <td class="px-3 py-3 border-b border-gray-200 text-center  text-xs">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $item->zonal }}</p>
                                    </td>
                                    <td class="px-3 py-3 border-b border-gray-200 text-xs">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $item->nombre }}</p>
                                    </td>
                                    <td class="px-3 py-3 border-b border-gray-200 text-center text-xs">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $item->tipolocal }}</p>
                                    </td>
                                    <td class="px-3 py-3 border-b border-gray-200 text-xs">
                                        @switch($item->prioridad)
                                            @case('CLASICO')
                                                <div
                                                    class="mx-4 flex place-content-center text-xs font-bold bg-orange-300 text-gray-900 whitespace-no-wrap">
                                                    <p>{{ $item->prioridad }}</p>
                                                </div>
                                            @break
                                            @case('ORO')
                                                <div
                                                    class="mx-4 flex place-content-center text-xs font-bold bg-yellow-300 text-gray-900 whitespace-no-wrap">
                                                    <p>{{ $item->prioridad }}</p>
                                                </div>
                                            @break
                                            @case('PLATA')
                                                <div
                                                    class="mx-4 flex place-content-center text-xs font-bold bg-stone-300 text-gray-900 whitespace-no-wrap">
                                                    <p>{{ $item->prioridad }}</p>
                                                </div>
                                            @break
                                            @case('BLACK')
                                                <div
                                                    class="mx-4 flex place-content-center text-xs font-bold bg-stone-800 text-gray-100 whitespace-no-wrap">
                                                    <p>{{ $item->prioridad }}</p>
                                                </div>
                                            @break
                                            @default
                                        @endswitch
                                    </td>


                                    <td class="px-3 py-3 border-b border-gray-200 text-center text-xs">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $item->clasificacion }}</p>
                                    </td>


                                    <!--Asignacion de permiso para edicion-->
                                    <td class="px-3 py-3 border-b border-gray-200 text-center text-xs">
                                        <!-- si el componente fuera exteno como el de creacion, usar (arroba)livewire para invocarlo, junto con los parametros --->
                                        <!-- ['site' => $item], key($item->id)) -->
                                        <!-- Llama a la funcion EDIT declarada en showusers -->
                                        <a class="btn btn-green" href="{{ route('sites.edit', $item->id) }}">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                        <!-- En vez de llamar a una funcion, emite una alerta de sweetalert2 definida al final de la hoja -->
                                        @can('sites.destroy')
                                            <a class="btn btn-red ml-2" wire:click="$emit('deleteSite', {{ $item->id }})">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        @endcan
                                    </td>
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

                    <div class="p-2 w-full flex bg-gray-800 text-white justify-end">
                        <a class="btn btn-green ml-2" href="{{ route ('sites.export') }}">
                            Exportar
                        </a>
                    </div>
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

    </div>
</div>
