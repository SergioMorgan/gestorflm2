@can('dashboard.index')
    <div class="max-w-7xl mx-auto sm:px-2 lg:px-4 py-4">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div wire:init="loadOstickets" >


                <div class="p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6">
                    <div class="bg-blue-300"> <!-- sm:col-span-1	md:col-span-1"> -->
                        <x-jet-label value="Cantidad pendientes" />
                        <x-jet-input type="text" class="w-full text-sm" readonly/>
                    </div>
                    <div class="bg-blue-300">
                        <x-jet-label value="Fuera objetivo" />
                        <x-jet-input type="text" class="w-full text-sm" readonly/>
                    </div>
                    <div class="bg-blue-300">
                        <x-jet-label value="Cantidad rechazados" />
                        <x-jet-input type="text" class="w-full text-sm" readonly/>
                    </div>
                </div>


                @if (count($ostickets))
                    <div class="table w-full ">
                        <div class="table-header-group">
                            <div class="table-row text-xs">
                                <div class="table-cell text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 uppercase tracking-wider">
                                    Estado
                                </div>
                                <div class="table-cell text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 uppercase tracking-wider">
                                    Siom
                                </div>
                                <div class="table-cell text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 uppercase tracking-wider">
                                    Zonal
                                </div>
                                <div class="table-cell text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 uppercase tracking-wider">
                                    Local
                                </div>
                                <div class="table-cell text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 uppercase tracking-wider">
                                    Prioridad
                                </div>
                                <div class="table-cell text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 uppercase tracking-wider">
                                    Inicio
                                </div>
                                <div class="table-cell text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 uppercase tracking-wider">
                                    SLA R
                                </div>
                                <div class="table-cell text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 uppercase tracking-wider">
                                    Duracion
                                </div>
                                <div class="table-cell text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 uppercase tracking-wider">
                                    Duracion2
                                </div>
                                <div class="table-cell text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 uppercase tracking-wider">
                                    cant Pr
                                </div>
                                <div class="table-cell text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 uppercase tracking-wider">
                                    Durac PR
                                </div>
                                <div class="table-cell text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 uppercase tracking-wider">
                                    PR
                                </div>
                                <div class="table-cell text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 uppercase tracking-wider">
                                    KPI
                                </div>
                            </div>
                        </div>

                        <div class="table-row-group">
                            @foreach ($ostickets as $item)
                                <div class="table-row text-xs">
                                    <div class="align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        @switch($item->estado)
                                        @case('PENDIENTE')
                                            <div
                                                class="mx-4 flex place-content-center text-xs bg-green-300 text-gray-900 whitespace-no-wrap">
                                                <p>{{ $item->estado }}</p>
                                            </div>
                                        @break
                                        @case('RECHAZADO')
                                            <div
                                                class="mx-4 flex place-content-center text-xs bg-purple-300 text-gray-900 whitespace-no-wrap">
                                                <p>{{ $item->estado }}</p>
                                            </div>
                                        @break
                                        @default
                                    @endswitch

                                    </div>
                                    <div class="min-w-[90px] align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        {{ $item->siom }}
                                    </div>
                                    <div class="align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        {{ $item->zonal }}
                                    </div>
                                    <div class="align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        {{ $item->nombre }}
                                    </div>
                                    <div class="align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        {{ $item->prioridad }}
                                    </div>
                                    <div class="min-w-[100px] align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        {{ date('d/m/Y H:i', strtotime($item->fechaasignacion)) }}
                                    </div>
                                    <div class="align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        {{ $item->sla}}
                                    </div>
                                    <div class="align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        {{-- <input type="text" > --}}
                                        {{-- <span id="duracionsinpr">{{$item->duracionsinpr}}</span> --}}
                                        {{ $item->duracionsinpr }}
                                    </div>
                                    <div id ="duracionsinpr" class="align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        {{ $prueba() }}
                                    </div>
                                    <div class="align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        {{ $item->cantidadpr }}
                                    </div>
                                    <div class="align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        {{ $item->duraciondepr }}
                                    </div>
                                    <div class="align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        {{ $item->prsconinicio == 0 ? 'NO TIENE PR' : ($item->prsconinicio > $item->prsconfin ? 'PR ABIERTA' : 'PR CERRADA') }}
                                    </div>
                                    <div class="align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        {{ $item->prsconfin }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div wire:loading.remove class="px-6 py-4 ">
                        No existen registros
                    </div>
                @endif

                <div class="flex justify-center">
                    <img wire:loading src="{{ asset('img/loading.gif') }}" class="w-30 p-5">
                </div>
            </div>
        </div>
    </div>
@endcan
