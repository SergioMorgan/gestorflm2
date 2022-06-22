{{-- <div>
    <a class="btn btn-green" href=#" wire:click="$set('open', true)"> 
        <i class="fa-solid fa-pen-to-square"></i>
    </a>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Editar usuario {{$item->name}}
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
                <select id="profile" class="form-control w-full" wire:model="user.profile">
                    <option value="USUARIO" selected>
                        USUARIO
                    </option>
                    <option value="ADMINISTRADOR">
                        ADMINISTRADOR
                    </option>
                </select>
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
            <x-jet-secondary-button class="mr-2" wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button class="mr-2" wire:click="save" wire:loading.attr="disabled" wire:target="save" {{-- , image" --}} 
{{--                class="disabled:opacity-25">
                Guardar
            </x-jet-danger-button>
        </x-slot>



    </x-jet-dialog-modal>
</div> --}}
