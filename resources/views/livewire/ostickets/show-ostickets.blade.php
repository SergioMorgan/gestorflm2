@can('ostickets.index')
    <div class="max-w-7xl mx-auto sm:px-2 lg:px-4 py-4">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div wire:init="loadOstickets">


                <div class="p-2 w-full flex justify-between bg-gray-800 text-white items-center">
                    <span class="px-2 ">LISTADO DE TICKETS </span>
                    @can('ostickets.create')
                        @livewire('ostickets.create-ostickets')
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

                @if (count($ostickets))
                    <div class="table w-full ">
                        <div class="table-header-group">
                            <div class="table-row text-xs bg-gray-300 font-bold text-center text-gray-800">

                                <div class="table-cell cursor-pointer px-3 py-3 border-b-2 border-gray-200    uppercase tracking-wider"
                                    wire:click="order('siom')">Siom
                                    @if ($sort == 'siom')
                                        @if ($direcion == 'asc')
                                            <i class="  fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </div>
                                <div class="table-cell cursor-pointer px-3 py-3 border-b-2 border-gray-200  uppercase tracking-wider"
                                    wire:click="order('siom')">Estado
                                    @if ($sort == 'estado')
                                        @if ($direcion == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </div>

                                <div class="table-cell cursor-pointer px-3 py-3 border-b-2 border-gray-200  uppercase tracking-wider"
                                    wire:click="order('siom')">Local
                                    @if ($sort == 'nombre')
                                        @if ($direcion == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </div>

                                <div class="table-cell cursor-pointer px-3 py-3 border-b-2 border-gray-200  uppercase tracking-wider"
                                    wire:click="order('siom')">Inicio
                                    @if ($sort == 'fechaasignacion')
                                        @if ($direcion == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </div>

                                <div class="table-cell  px-3 py-3 border-b-2 border-gray-200 uppercase tracking-wider">
                                    Detalle
                                </div>

                                <div class="col-span-2 table-cell px-3 py-3 border-b-2 border-gray-200  uppercase tracking-wider">
                                    Editar
                                </div>
                                @can('ostickets.destroy')
                                    <div class="col-span-2 table-cell px-3 py-3 border-b-2 border-gray-200  uppercase tracking-wider">
                                        Borrar
                                    </div>
                                @endcan
                            </div>
                        </div>

                        <div class="table-row-group">
                            @foreach ($ostickets as $item)
                                <div class="table-row text-xs">

                                    <div class="min-w-[90px] align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap font-bold">
                                        {{ $item->siom }}
                                    </div>
                                    <div class="align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        {{ $item->estado }}
                                    </div>
                                    <div class="align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        {{ $item->site->nombre }}
                                    </div>
                                    <div class="min-w-[100px] align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        {{ date('d/m/Y H:i', strtotime($item->fechaasignacion)) }}
                                    </div>
                                    <div class=" break-all max-w-[800px] table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        {{ $item->detalle }}
                                    </div>
                                    <div class="max-w-[50px] align-middle text-center table-cell px-1 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        <a class="btn btn-green" href="{{ route('ostickets.edit', $item->id) }}" target="_blank">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                    </div>
                                    @can('ostickets.destroy')
                                        <div class="max-w-[50px] align-middle text-center table-cell px-1 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                            <a class="btn btn-red ml-2" wire:click="$emit('deleteOsticket', {{ $item->id }})">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </div>
                                    @endcan
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @if ($ostickets->hasPages())
                        <div class="px-6 py-3">
                            {{ $ostickets->links() }}
                        </div>
                    @endif
                    <div class="p-2 w-full flex bg-gray-800 text-white justify-end">
                        <a class="btn btn-green ml-2" href="{{ route ('ostickets.export') }}">
                            Exportar
                        </a>
                    </div>
                @else
                    <!--wire:loading.remove oculta un elemento durante la carga-->
                    <div wire:loading.remove class="px-6 py-4 ">
                        No existen registros
                    </div>
                @endif

                <div class="flex justify-center">
                    <img wire:loading src="../../../../public/loading.gif" class="w-30 p-5">
                </div>

                <!-- script que se pasa a app.blade.php para mensaje de confirmacion de borrado-->
                <!-- si se acepta, emite al formulario show.users(por ende, al controlador ShowXxxxx) y ejecuta funcion delente con el id asociado-->
                @push('js')
                    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <!-- $site->id -->
                    <script>
                        livewire.on('deleteOsticket', ticketId => {
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
                                    livewire.emitTo('ostickets.show-ostickets', 'delete', ticketId);
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
@endcan
