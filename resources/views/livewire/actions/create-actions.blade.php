<div>
    <x-jet-danger-button wire:click="$set('open',true)">
        AGREGAR ACTUACION
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Ingresa nueva actuacion
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Detalle" />
                <x-jet-input type="text" class="w-full" wire:model.defer="detalle" />
                <x-jet-input-error for="detalle" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button class="mr-2" wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button class="mr-2" wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                Guardar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
