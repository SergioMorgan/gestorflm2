<div>
    <!------VENTANA MODAL PARA LA CREACION, NOMBRE "OPEN"------>
    <!------BOTON ROJO DE CREACION------>

    <x-jet-button wire:click="$set('open',true)" class="bg-blue-700">
        Crear nuevo usuario
    </x-jet-button>

    <!------VENTANA MODAL PRINCIPAL------>
    <x-jet-dialog-modal wire:model="open">

        <!---- TITULO ---->
        <x-slot name="title" >
            <span class="text-gray-900"> Crear nuevo usuario</span>
            
        </x-slot>

        <!----  CONTENIDO ---->
        <x-slot name="content">
            
            <div class="mb-4 text-gray-900">
                <x-jet-label value="Nombre" />
                <!----------Usamos DEFER para evitar que se dispare una solicitud de actualizacion si cambiamos el valor del imput-------->
                <x-jet-input type="text" class="w-full" wire:model.defer="name" />
                <!---- input error muestra un mensaje de error asociado al campo con el mismo nombre del imput ---->
                <x-jet-input-error for="name" />
            </div>
            <div class="mb-4 text-gray-900">
                <x-jet-label value="Correo electrónico" />
                <x-jet-input type="email" class="w-full" wire:model.defer="email" />
                <x-jet-input-error for="email" />
            </div>
            <div class="mb-4 text-gray-900">
                <x-jet-label value="Password" />
                <x-jet-input type="password" class="w-full" wire:model.defer="password" />
                <x-jet-input-error for="password" />
            </div>
            
            <div class="mb-4 text-gray-900">
                <x-jet-label value="Perfil" />
                <select class="form-control w-full text-sm" wire:model.defer="perfil">
                    <option selected >Seleccione estado</option>
                    <?php foreach($selectorroles as $item): ?>
                    <option value="<?= $item->id ?>"> <?= $item->name ?> </option>
                    <?php endforeach; ?>
                </select>
                <x-jet-input-error for="perfil" />
            </div>

<!--
            <div class="mb-4 text-gray-900">
                <x-jet-label value="Estado" />
                <select class="form-control w-full" wire:model.defer="status">
                    <option value="ACTIVO" selected>
                        ACTIVO
                    </option>
                    <option value="INACTIVO">
                        INACTIVO
                    </option>
                </select>
            </div>
-->
        </x-slot>

        <!----  FOOTER ---->
        <x-slot name="footer">
            <!---- WIRE:CLICK SET cambia lo variable open a FALSE, y sirve para controlar el valor de los campos / resetearlos ---->
            <x-jet-secondary-button class="mr-2" wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <!---- WIRE:CLICK SAVE llama a la funcion save() del CreateUser ---->
            <x-jet-danger-button class="mr-2" wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                Guardar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>

</div>
