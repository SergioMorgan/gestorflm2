<div>
    <!------VENTANA MODAL PARA LA CREACION, NOMBRE "OPEN"------>
    <!------BOTON ROJO DE CREACION------>

    <x-jet-button wire:click="$set('open',true)"  class="bg-blue-700">
        Crear nuevo ticket
    </x-jet-button>


    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear nuevo ticket OS
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="ID Site" />
                {{-- corregir el caso del value --}}
                <x-jet-input type="text" class="w-full" wire:model.defer="site_id" />
                <x-jet-input-error for="site_id" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Siom" />
                <x-jet-input type="text" class="w-full" wire:model.defer="siom" />
                <x-jet-input-error for="siom" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Tipo" />
                <select class="form-control w-full" wire:model.defer="tipo">
                    <option selected>Seleccione tipo</option>
                    <option value="ENERGIA">
                        ENERGIA
                    </option>
                    <option value="RADIO">
                        RADIO
                    </option>
                    <option value="TRANSPORTE">
                        TRANSPORTE
                    </option>
                </select>
                <x-jet-input-error for="tipo" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Fecha asignacion" />
                <x-jet-input type="datetime-local" class="w-full" wire:model.defer="fechaasignacion" />
                <x-jet-input-error for="fechaasignacion" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Detalle" />
                <textarea class="form-control w-full" name="detalle" wire:model.defer="detalle" rows="5"></textarea>
                <x-jet-input-error for="detalle" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="mr-2" wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button class="mr-2" wire:click="save" wire:loading.attr="disabled" wire:target="save"
                class="disabled:opacity-25">
                Guardar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>

</div>
