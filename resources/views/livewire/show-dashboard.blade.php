
@can('dashboard.index')

    <div class="max-w-7xl mx-auto sm:px-2 lg:px-4 py-4">
        {{-- <script>
            window.document.title = 'Dashboard';
        </script> --}}

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div wire:init="loadOstickets" >


                <div class="p-2 w-full flex justify-between bg-gray-800 text-white items-center">
                    <span class="w-full px-2 font-bold text-center">PENDIENTES</span>
                </div>

                @if (count($osticketsPendientes))
                    <div class="table w-full ">
                        <div class="table-header-group">
                            <div class="table-row text-xs">
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
                                    Dur. neta
                                </div>
                                <div class="table-cell text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 uppercase tracking-wider">
                                    SLA
                                </div>
                                <div class="table-cell text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 uppercase tracking-wider">
                                    Dur. con PR
                                </div>
                                <div class="table-cell text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 uppercase tracking-wider">
                                    EstadoPR
                                </div>
                                <div class="table-cell text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 uppercase tracking-wider">
                                    KPI
                                </div>
                            </div>
                        </div>
                        <div class="table-row-group">
                            @foreach ($osticketsPendientes as $item)
                                <div class="table-row text-xs">
                                    <div class="min-w-[90px] align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        <a href="{{ route('ostickets.edit', $item->idsiom) }}" target="_blank"> {{ $item->siom }} </a>
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
                                    <div id ="duracionsinpr" class="align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        {{-- {{ convertirHora($item->duracionsinpr) }} --}}
                                        {{ ($item->duracionsinpr) }}
                                    </div>
                                    <div class="align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        {{ $item->sla}}
                                    </div>
                                    <div class="align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        {{-- {{ convertirHora($item->duracionsinpr - $item->duraciondepr) }} --}}
                                        {{ ($item->duracionsinpr - $item->duraciondepr) }}
                                    </div>
                                    <div class="align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        {{ $item->prsconinicio == 0 ? 'NO TIENE PR' : ($item->prsconinicio > $item->prsconfin ? 'PR ABIERTA' : 'PR CERRADA') }}
                                    </div>
                                    <div class="align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        @if (($item->duracionsinpr - $item->duraciondepr) > convertirSegundos($item->sla))
                                            <div class="mx-4 flex place-content-center text-xs bg-red-500 text-white whitespace-no-wrap">
                                                <p>FUERA</p>
                                            </div>
                                        @else
                                            <div class="mx-4 flex place-content-center text-xs bg-green-300 text-gray-900 whitespace-no-wrap">
                                                <p>DENTRO</p>
                                            </div>
                                        @endif
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

                <div class="p-4 bg-white"></div>

                <div class="p-2 w-full flex justify-between bg-gray-800 text-white items-center">
                    <span class="w-full px-2 font-bold text-center">RECHAZADOS</span>
                </div>
                @if (count($osticketsRechazados))
                    <div class="table w-full ">
                        <div class="table-header-group">
                            <div class="table-row text-xs">
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
                                    Detalle
                                </div>
                            </div>
                        </div>

                        <div class="table-row-group">
                            @foreach ($osticketsRechazados as $item)
                                <div class="table-row text-xs">
                                    <div class="min-w-[90px] align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        <a href="{{ route('ostickets.edit', $item->idsiom) }}" target="_blank"> {{ $item->siom }} </a>
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
                                    <div id ="duracionsinpr" class="break-all align-middle text-center table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                        {{ $item->detalle }}
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
