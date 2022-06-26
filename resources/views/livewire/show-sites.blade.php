<div wire:init="loadSites">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <x-table>
            <div class="px-6 py-4 flex items-center">
                <div class="flex items-center">
                    
                    <span>Mostrar</span>
                    <select wire:model="cant" class="mx-2 form-control">
                        <option value="50">50</option>
                        <option value="75">75</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                    </select>
                    <span>entradas</span>
                </div>
                <x-jet-input type="text" wire:model="search" class="flex-1 mx-4" placeholder="buscar..." />
                @can('sites.create')
                    <a class="btn btn-green" href="{{ route('sites.create') }}">
                        {{-- <i class="fa-solid fa-edit"></i> --}}
                        Crear local
                    </a>
                @endcan
            </div>
            @if (count($sites))
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class=" w-[100px] cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                                wire:click="order('localid')">
                                ID

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

                                {{-- ----sort------ --}}
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
                                Estado
                            </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Config
                                </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sites as $site)
                            <tr>
                                <td class="w-[75px] px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $site->localid }}</p>
                                </td>
                                <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $site->zonal }}</p>
                                </td>
                                <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $site->nombre }}</p>
                                </td>
                                <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $site->tipolocal }}</p>
                                </td>
                                <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $site->clasificacion }}</p>
                                </td>
                                <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                    {{-- <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative">ESTADO</span>
                                    </span> --}}
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $site->estado }}</p>
                                </td>
                                <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                    {{-- @can('sites.create') --}}
                                        <a class="btn btn-green" href="{{ route('sites.edit', $site) }}">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                    {{-- @endcan --}}

                                    @can('sites.destroy')
                                        <a class="btn btn-red ml-2"
                                            wire:click="$emit('deleteSite', {{ $site->id }})">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>

                                        {{-- <a class="btn btn-red ml-2" href="{{ route('sites.destroy', $site) }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </a> --}}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($sites->hasPages())
                    <div class="px-6 py-3">
                        {{ $sites->links() }}
                    </div>
                @endif
            @else
                <div class="px-6 py-4">
                    No existen registros
                </div>
            @endif
        </x-table>
        <div class="flex justify-center">
            <img wire:loading src="{{ asset('img/loading.gif') }}" class="w-30 p-5">
        </div>
    </div>

    @push('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        $site->id
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
                        livewire.emitTo('show-sites', 'delete', siteId);
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
