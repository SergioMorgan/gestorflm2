<div>

    <a class="btn btn-green" wire:click="$set('open',true)"">
        <i class="fas fa-edit"></i>
    </a>

    <x-jet-dialog-modal wire:model="open">
        <!---- TITULO ---->
        <x-slot name="title">
            Editar parada de reloj
        </x-slot>
        <!----  CONTENIDO ---->
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Fecha inicio" />
                <x-jet-input type="text" class="w-full" wire:model="clockstop.inicio" />
                <x-jet-input-error for="clockstop.inicio" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Fecha fin" />
                <x-jet-input type="text" class="w-full" wire:model="clockstop.fin" />
                <x-jet-input-error for="clockstop.fin" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Motivo" />
                <select class="form-control w-full" wire:model="clockstop.motivo">
                    <?php foreach($selectMotivo as $item4): ?>
                    <option value="<?= $item4 ?>"> <?= $item4 ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-4">
                <x-jet-label value="Sustento" />
                <x-jet-input type="text" class="w-full" wire:model="clockstop.sustento" />
                <x-jet-input-error for="clockstop.sustento" />
            </div>
        </x-slot>
        <!----  FOOTER ---->
        <x-slot name="footer">
            <!---- WIRE:CLICK SET cambia lo variable open a FALSE, y sirve para controlar el valor de los campos / resetearlos ---->
            <x-jet-secondary-button class="mr-2" wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <!---- WIRE:CLICK SAVE llama a la funcion save() del CreateUser ---->
            <x-jet-danger-button class="mr-2" wire:click="updateClockstop" wire:loading.attr="disabled"
                class="disabled:opacity-25">
                Guardar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
