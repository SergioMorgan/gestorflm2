<div wire:init="loadUsers">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <x-table>
            <div class="px-6 py-4 flex items-center">
                <div class="flex items-center">
                    <span>Mostrar</span>
                    <select wire:model="cant" class="mx-2 form-control">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span>entradas</span>
                </div>
                <x-jet-input type="text" wire:model="search" class="flex-1 mx-4" placeholder="buscar..." />
                @can('users.create')
                    @livewire('create-user')
                @endcan
            </div>
            @if (count($users))
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                                wire:click="order('id')">
                                ID

                                @if ($sort == 'id')
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
                                wire:click="order('name')">
                                Nombre

                                @if ($sort == 'name')
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
                                wire:click="order('email')">
                                E-mail

                                {{-- ----sort------ --}}
                                @if ($sort == 'email')
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
                                wire:click="order('created_at')">
                                Creado el

                                @if ($sort == 'created_at')
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
                                Perfil
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Estado
                            </th>
                            @can('users.create')
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Config.
                                </th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $item->id }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $item->name }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $item->email }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $item->created_at }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">


                                    @if (!empty($item->getRoleNames()))
                                        @foreach ($item->getRoleNames() as $role)
                                            <label class="badge badge-success">{{ $role }}</label>
                                        @endforeach
                                    @endif


                                    <p class="text-gray-900 whitespace-no-wrap">
                                        xxxxxxx
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{-- <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative">ESTADO</span>
                                    </span> --}}
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $item->status }}</p>
                                </td>
                                @can('users.create')    
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{-- <span class="flex justify-between"> --}}
                                        {{-- @livewire('edit-user', ['user' => $item], key($item->id)) --}}
                                        <a class="btn btn-green"
                                            wire:click="edit({{ $item }})">{{-- wire:click="$set('open', true)" --}}
                                            <i class="fa-solid fa-edit"></i>
                                        </a>

                                        <a class="btn btn-red ml-2"
                                            wire:click="$emit('deleteUser', {{ $item->id }})">{{-- wire:click="$set('open', true)" --}}
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                        {{-- @livewire('delete-user', ['user' => $user], key($user->id)) --}}
                                        {{-- </span> --}}
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($users->hasPages())
                    <div class="px-6 py-3">
                        {{ $users->links() }}
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
    <x-jet-dialog-modal wire:model="open_edit">

        <x-slot name="title">
            Editar registro
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" class="w-full" wire:model="user.name" />
                <x-jet-input-error for="user.name" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Correo electrónico" />
                <x-jet-input type="email" class="w-full" wire:model="user.email" />
                <x-jet-input-error for="user.email" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Perfil" />
                <div class=" px-4 py-2 div-control">

                    {{-- @foreach ($roles as $role)
                            <x-jet-label value="{{$role->name}}" />
                            <input class="" type="checkbox"  value="{{$role->id}} " >
                        @endforeach --}}
                </div>
            </div>

            <div class="mb-4">
                <x-jet-label value="Estado" />
                <select class="form-control w-full" wire:model="user.status">
                    <option value="ACTIVO" selected>
                        ACTIVO
                    </option>
                    <option value="INACTIVO">
                        INACTIVO
                    </option>
                </select>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="mr-2" wire:click="$set('open_edit', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button class="mr-2" wire:click="update" wire:loading.attr="disabled" {{-- wire:target="save"  , image" --}}
                class="disabled:opacity-25">
                Guardar
            </x-jet-danger-button>
        </x-slot>



    </x-jet-dialog-modal>

    @push('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        $item->id
        <script>
            livewire.on('deleteUser', userId => {
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
                        livewire.emitTo('show-users', 'delete', userId);
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
