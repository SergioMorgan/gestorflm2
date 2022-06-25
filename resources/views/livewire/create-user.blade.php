<div>
    <x-jet-danger-button wire:click="$set('open',true)">
        Crear nuevo usuario
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear nuevo usuario
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" class="w-full" wire:model.defer="name" />
                <x-jet-input-error for="name" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Correo electrónico" />
                <x-jet-input type="email" class="w-full" wire:model.defer="email" />
                <x-jet-input-error for="email" />

            </div>

            <div class="mb-4">
                <x-jet-label value="Password" />
                <x-jet-input type="password" class="w-full" wire:model.defer="password" />
                <x-jet-input-error for="password" />

            </div>
{{-- 
            <div class="mb-4">
                <x-jet-label value="Perfil" />
                <select id="profile" class="form-control w-full" wire:model.defer="profile">
                    <option value="USUARIO" selected>
                        USUARIO
                    </option>
                    <option value="ADMINISTRADOR">
                        ADMINISTRADOR
                    </option>
                </select>
            </div> --}}

            <div class="mb-4">
                <x-jet-label value="Estado" />
                {{-- <x-jet-input type="text" class="w-full"  wire:model.defer="status" /> --}}

                <select class="form-control w-full" wire:model.defer="status">
                    <option value="ACTIVO" selected>
                        ACTIVO
                    </option>
                    <option value="INACTIVO">
                        INACTIVO
                    </option>
                </select>
            </div>
{{-- 
            @if ($image)
                <img class="mb-4" src="{{ $image->temporaryUrl() }}" alt="">
            @endif

            <div wire:loading wire:target="image" class=" mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Imagen cargando</strong>
                <span class="sm:inline">Espere hasta que la imagen se haya procesado.</span>
            </div>

            <div>
                <input type="file" wire:model="image">
                <x-jet-input-error for="image" />

            </div>
 --}}
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button class="mr-2" wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button class="mr-2" wire:click="save" wire:loading.attr="disabled" wire:target="save"  {{-- , image" --}}
                class="disabled:opacity-25">
                Guardar
            </x-jet-danger-button>

            {{-- PRUEBA DE ESTADOS DE CARGA --}}
            {{-- <span wire:loading wire:target="save">Cargando...</span> --}}
        </x-slot>

    </x-jet-dialog-modal>

</div>
