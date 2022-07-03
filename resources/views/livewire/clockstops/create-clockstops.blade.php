<div>
    <!------VENTANA MODAL PARA LA CREACION, NOMBRE "OPEN"------>

    <!------BOTON ROJO DE CREACION------>
    <x-jet-danger-button wire:click="$set('open',true)">
        AGREGAR NUEVA P.R.
    </x-jet-danger-button>

    <!------VENTANA MODAL PRINCIPAL------>
    <x-jet-dialog-modal wire:model="open">

        <!---- TITULO ---->
        <x-slot name="title">
            Crear nueva parada de reloj
        </x-slot>

        <!----  CONTENIDO ---->
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Fecha inicio" />
                <x-jet-input type="datetime-local" class="w-full" wire:model.defer="inicio" />
                <x-jet-input-error for="inicio" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Fecha fin" />
                <x-jet-input type="datetime-local" class="w-full" wire:model.defer="fin" />
                <x-jet-input-error for="fin" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Motivo" />
                <select class="form-control w-full" wire:model.defer="motivo">
                    <?php foreach($selectMotivo as $item): ?>
                    <option value="<?= $item ?>"> <?= $item ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-4">
                <x-jet-label value="Sustento" />
                <x-jet-input type="text" class="w-full" wire:model.defer="sustento" />
                <x-jet-input-error for="sustento" />
            </div>
        </x-slot>

        <!----  FOOTER ---->
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
