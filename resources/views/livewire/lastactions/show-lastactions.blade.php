<div class="max-w-7xl mx-auto sm:px-2 lg:px-4 py-4">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div wire:init="loadLastactions" ">
            <div class="p-2 w-full flex justify-between bg-gray-800 text-white items-center">
                <span class="px-2 ">LISTADO DE ACTUACIONES</span>
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
                @if (count($lastactions))
                    <table class="min-w-full leading-normal text-xs">
                        <thead>
                            <tr class="bg-gray-300  text-gray-800">
                                <th class="px-5 py-3 border-b-2 border-gray-200 text-center uppercase tracking-wider)">
                                    Fecha
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 text-center  uppercase tracking-wider">
                                    SIOM
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 text-center uppercase tracking-wider">
                                    Local
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 text-center uppercase tracking-wider">
                                    Usuario
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 text-center uppercase tracking-wider">
                                    Detalle actuacion
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lastactions as $item)
                                <tr class="bg-white">
                                    <td class="px-3 py-3 border-b border-gray-200 text-center  text-xs">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ date('d/m/Y H:i', strtotime($item->created_at)) }}</p>
                                    </td>
                                    <td class="px-3 py-3 border-b border-gray-200 text-center text-xs">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $item->siom}}</p>
                                    </td>
                                    <td class="px-3 py-3 border-b border-gray-200 text-center  text-xs">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $item->nombre }}</p>
                                    </td>
                                    <td class="px-3 py-3 border-b border-gray-200 text-center  text-xs">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $item->name }}</p>
                                    </td>
                                    <td class="px-3 py-3 border-b border-gray-200 text-xs">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $item->detalle}}</p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($lastactions->hasPages())
                        <div class="px-6 py-3">
                            {{ $lastactions->links() }}
                        </div>
                    @endif
                @else
                    <div wire:loading.remove class="px-6 py-4 ">
                        No existen registros
                    </div>
                @endif
            </x-table>
            <div class="flex justify-center">
                <img wire:loading src="{{ asset('img/loading.gif') }}" class="w-30 p-5">
            </div>
        </div>
    </div>
</div>
