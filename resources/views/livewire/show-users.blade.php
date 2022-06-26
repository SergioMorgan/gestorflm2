<div wire:init="loadUsers">
    <!-- Al cargar el formulario, llama a la funcion loadUser() = $this->readyToLoad=true; -->
    LISTADO DE USUARIOS
    <x-table>

        <!--Elemento para mostrar lista de registros, barra de busqueda y boton (objeto) para creacion-->
        <div class="px-4 pb-4 flex items-center">
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

        <!--No muestra registros si no existen en la tabla-->
        @if (count($users))
            <table class="min-w-full leading-normal">
                <thead>
                    <!--cabecera de tabla-->
                    <tr>
                        <th class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            wire:click="order('id')"> <!--asocia la funcion order a la cabecera-->
                            ID
                            <!--Permite definir el comportamiento de los iconos segun el orden de la tabla-->
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
                            Estado
                        </th>

                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Perfil
                        </th>

                        <!--PERMISO DE VISUALIZACION PARA LAS CONFIGURACIONES A USUARIOS CUYO ROL PERMITA USERS.EDIT-->
                        @can('users.create')
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Config.
                            </th>
                        @endcan
                    </tr>
                </thead>

                <!-- Registros de la tabla-->
                <tbody>
                    <!-- Iteracion a traves del variable USERS recibida desde el SHOWUSER-->
                    <!-- Se traslada al bucle a travez de la variable ITEM-->
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
                                @if ($item->status == "ACTIVO")
                                    <img class="object-fill h-8 w-16" src="/img/activeicon.png" alt="">
                                @else
                                    <img class="object-fill h-8 w-16" src="/img/inactiveicon.png" alt="">
                                @endif
                            </td>

                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                @if (!empty($item->getRoleNames()))
                                    @foreach ($item->getRoleNames() as $role)
                                        <label class="badge badge-success">{{ $role }}</label>
                                    @endforeach
                                @endif
                            </td>

                            <!--Asignacion de permiso para edicion-->
                            @can('users.create')
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <!-- si el componente fuera exteno como el de creacion, usar (arroba)livewire para invocarlo, junto con los parametros --->
                                    <!-- ['user' => $item], key($item->id)) -->
                                    <!-- Llama a la funcion EDIT declarada en showusers -->
                                    <a class="btn btn-green" wire:click="edit({{ $item }})">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                    <!-- En vez de llamar a una funcion, emite una alerta de sweetalert2 definida al final de la hoja -->
                                    <a class="btn btn-red ml-2" wire:click="$emit('deleteUser', {{ $item->id }})">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Condicional para mostrar paginacion en caso haya registros-->
            @if ($users->hasPages())
                <div class="px-6 py-3">
                    {{ $users->links() }}
                </div>
            @endif
        @else
            <!--wire:loading.remove oculta un elemento durante la carga-->
            <div wire:loading.remove class="px-6 py-4 ">
                No existen registros
            </div>
        @endif
    </x-table>

    <!-- GIF de carga mientras se encuentra cargado, eso se controla con el wire:loading-->
    <div class="flex justify-center">
        <img wire:loading src="{{ asset('img/loading.gif') }}" class="w-30 p-5">
    </div>




    <!-- *******MODAL DE EDICION****** -->
    <!-- ESTE es el modal para edicion, se carga fuera para no generar uno por cada registro-->
    <x-jet-dialog-modal wire:model="open_edit">
        <!-- en su lugar, solo se llama desde el ShowUsers con el nombre definido en el wire:model-->

        <!--Titulo-->
        <x-slot name="title">
            Editar registro
        </x-slot>

        <!--Contenido - formulario-->
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
            <!--FALTA DISPLAY PARA ROLES-->
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

        <!--Footer para los botones-->
        <x-slot name="footer">
            <x-jet-secondary-button class="mr-2" wire:click="$set('open_edit', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button class="mr-2" wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">
                Guardar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>


    <!-- script que se pasa a app.blade.php para mensaje de confirmacion de borrado-->
    <!-- si se acepta, emite al formulario show.users(por ende, al controlador ShowXxxxx) y ejecuta funcion delente con el id asociado-->
    @push('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- $item->id-->
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
