<div class="max-w-7xl mx-auto sm:px-2 lg:px-4 py-4">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="container">
        @can('sites.create')
            <form wire:submit.prevent="submit"> <!-- onkeydown="return event.key != 'Enter';"> -->
        @endcan
                {{-- <x-jet-danger-button class="mr-2" wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25"> --}}
                <div class="pt-4 px-4 w-full flex justify-between ">
                    <span>LOCALES</span>
                    @can('sites.create')
                    <x-jet-danger-button type="submit">
                        Guardar
                    </x-jet-danger-button>
                    @endcan
                </div>
                <div class="p-6 grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-2">
                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="ID Local" />
                        <x-jet-input type="text" class="w-full" wire:model.defer="localid" />
                        <x-jet-input-error for="localid" />
                    </div>

                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="Estado" />
                        <select class="form-control w-full" wire:model.defer="estado">
                            <option selected>Seleccione estado</option>
                            <?php foreach($selectEstado as $item): ?>
                            <option value="<?= $item ?>"> <?= $item ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <x-jet-input-error for="estado" />
                    </div>

                    <div class="{{ $colorEtiquetas }} md:col-span-2 lg:col-span-1">
                        <x-jet-label value="Zonal" />
                        <select class="form-control w-full" wire:model.defer="zonal">
                            <option selected>Seleccione zonal</option>
                            <?php foreach($selectZonal as $item): ?>
                            <option value="<?= $item ?>"> <?= $item ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <x-jet-input-error for="zonal" />
                    </div>

                    <div class="{{ $colorEtiquetas }} sm:col-span-3 md:col-span-2 lg:col-span-3">
                        <x-jet-label value="Nombre" />
                        <x-jet-input type="text" class="w-full" wire:model.defer="nombre" />
                        {{-- <textarea name="nombre" id="nombre" cols="30" rows="10"></textarea> --}}
                        <x-jet-input-error for="nombre" />
                    </div>

                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="SLA Presencia" />
                        <select class="form-control w-full" wire:model.defer="slapresencia">
                            <option selected>Seleccione SLA</option>
                            <?php foreach($selectSlapresencia as $item): ?>
                            <option value="<?= $item ?>"> <?= $item ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <x-jet-input-error for="slapresencia" />
                    </div>

                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="SLA Resolucion" />
                        <select class="form-control w-full" wire:model.defer="slaresolucion">
                            <option selected>Seleccione SLA</option>
                            <?php foreach($selectSlaresolucion as $item): ?>
                            <option value="<?= $item ?>"> <?= $item ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <x-jet-input-error for="slaresolucion" />
                    </div>

                </div>


                <div class="p-6 grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-2">
                    <div class="{{ $colorEtiquetas }}"v>
                        <x-jet-label value="Clasificacion" />
                        <select class="form-control w-full" wire:model.defer="clasificacion">
                            <option selected>Seleccione clasificacion</option>
                            <?php foreach($selectClasificacion as $item): ?>
                            <option value="<?= $item ?>"> <?= $item ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <x-jet-input-error for="clasificacion" />
                    </div>

                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="Prioridad" />
                        <select class="form-control w-full" wire:model.defer="prioridad">
                            <option selected>Seleccione prioridad</option>
                            <?php foreach($selectPrioridad as $item): ?>
                            <option value="<?= $item ?>"> <?= $item ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <x-jet-input-error for="prioridad" />
                    </div>

                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="Facturacion" />
                        <select class="form-control w-full" wire:model.defer="facturacion">
                            <option selected>Seleccione facturacion</option>
                            <?php foreach($selectFacturacion as $item): ?>
                            <option value="<?= $item ?>"> <?= $item ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <x-jet-input-error for="Facturacion" />
                    </div>

                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="Tipo de local" />
                        <select class="form-control w-full" wire:model.defer="tipolocal">
                            <option selected>Seleccione tipo</option>
                            <?php foreach($selectTipolocal as $item): ?>
                            <option value="<?= $item ?>"> <?= $item ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <x-jet-input-error for="tipolocal" />
                    </div>

                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="Tipo de zona" />
                        <select class="form-control w-full" wire:model.defer="tipozona">
                            <option selected>Seleccione tipo</option>
                            <?php foreach($selectTipozona as $item): ?>
                            <option value="<?= $item ?>"> <?= $item ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <x-jet-input-error for="tipozona" />
                    </div>

                </div>


                <div class="p-6 grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-2">
                    <div class="{{ $colorEtiquetas }} lg:col-span-2">
                        <x-jet-label value="Suministro" />
                        <x-jet-input type="text" class="w-full" wire:model.defer="suministro" />
                        <x-jet-input-error for="suministro" />
                    </div>

                    <div class="{{ $colorEtiquetas }} lg:col-span-2">
                        <x-jet-label value="Distribuidor" />
                        <x-jet-input type="text" class="w-full" wire:model.defer="distribuidor" />
                        <x-jet-input-error for="distribuidor" />
                    </div>

                    <div class="{{ $colorEtiquetas }} sm:col-span-2 lg:col-span-2">
                        <x-jet-label value="Torrera" />
                        <x-jet-input type="text" class="w-full" wire:model.defer="torrera" />
                        <x-jet-input-error for="torrera" />
                    </div>

                    <div class="{{ $colorEtiquetas }} sm:col-span-3 md:col-span-4 lg:col-span-6">
                        <x-jet-label value="Observaciones" />
                        <x-jet-input type="text" class="w-full" wire:model.defer="observaciones" />
                        <x-jet-input-error for="observaciones" />
                    </div>

                </div>


                <div class="p-6 grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-2">
                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="Departamento" />
                        <x-jet-input type="text" class="w-full" wire:model.defer="departamento" />
                        <x-jet-input-error for="departamento" />
                    </div>

                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="Provincia" />
                        <x-jet-input type="text" class="w-full" wire:model.defer="provincia" />
                        <x-jet-input-error for="provincia" />
                    </div>

                    <div class="{{ $colorEtiquetas }} md:col-span-2 lg:col-span-1">
                        <x-jet-label value="Distrito" />
                        <x-jet-input type="text" class="w-full" wire:model.defer="distrito" />
                        <x-jet-input-error for="distrito" />
                    </div>

                    <div class="{{ $colorEtiquetas }} sm:col-span-4 lg:col-span-3">
                        <x-jet-label value="Direccion" />
                        <x-jet-input type="text" class="w-full" wire:model.defer="direccion" />
                        <x-jet-input-error for="direccion" />
                    </div>

                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="Latitud" />
                        <x-jet-input type="text" class="w-full" wire:model.defer="latitud" />
                        <x-jet-input-error for="latitud" />
                    </div>

                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="Longitud" />
                        <x-jet-input type="text" class="w-full" wire:model.defer="longitud" />
                        <x-jet-input-error for="longitud" />
                    </div>

                    <div class="sm:col-span-3 md:col-span-4 lg:col-span-6 ">
                        <x-jet-label class="{{ $colorEtiquetas }}" value="Imagen" />
                        <x-jet-input type="text" class="w-full" wire:model.defer="urlimagen" />
                        <x-jet-input-error for="urlimagen" />

                        <img class="form-control w-full h-fulk object-none "
                            src="{{$urlimagen}}"
                            alt="<<magen del local>>">

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


