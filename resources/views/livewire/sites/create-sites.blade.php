<div class="max-w-7xl mx-auto sm:px-2 lg:px-4 py-4">
    <div class=" overflow-hidden shadow-xl sm:rounded-lg bg-gray-300">
        {{-- <div class="container"> --}}
            @can('sites.create') <form wire:submit.prevent="submit"> @endcan
                <div class="p-2 w-full flex justify-between bg-gray-800 text-white items-center">
                    <span class="px-2">LOCALES</span>
                    @can('sites.create')
                        <x-jet-button type="submit" class="bg-blue-700">
                            Guardar
                        </x-jet-button>
                    @endcan
                </div>

                <div class="border-b-2 px-4 py-4 grid grid-cols-1 sm:grid-cols-3 md:grid-cols-6 lg:grid-cols-8 xl:grid-cols-8 gap-2">
                    <div class="sm:row-span-1 ">
                        <x-jet-label value="ID Local" />
                        <x-jet-input type="text" class="w-full text-sm" wire:model.defer="localid" />
                        <x-jet-input-error for="localid" />
                    </div>
                    <div class="text-xs md:col-span-2 xl:col-span-1">
                        <x-jet-label value="Estado" />
                        <select class="form-control w-full text-sm" wire:model.defer="estado">
                            <option selected>Seleccione estado</option>
                            <?php foreach($selectEstado as $item): ?>
                            <option value="<?= $item ?>"> <?= $item ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <x-jet-input-error for="estado" />
                    </div>
                    <div class="text-xs md:col-span-3 lg:col-span-1">
                        <x-jet-label value="Zonal" />
                        <select class="form-control w-full text-sm" wire:model.defer="zonal">
                            <option selected>Seleccione zonal</option>
                            <?php foreach($selectZonal as $item): ?>
                            <option value="<?= $item ?>"> <?= $item ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <x-jet-input-error for="zonal" />
                    </div>
                    <div class="text-xs sm:col-span-2 md:col-span-3 lg:col-span-3 xl:col-span-3">
                        <x-jet-label value="Nombre" />
                        <x-jet-input type="text" class="w-full text-sm" wire:model.defer="nombre" />
                        {{-- <textarea name="nombre" id="nombre" cols="30" rows="10"></textarea> --}}
                        <x-jet-input-error for="nombre" />
                    </div>
                    <div class="text-xs">
                        <x-jet-label value="Tipo de local" />
                        <select class="form-control w-full text-sm" wire:model.defer="tipolocal">
                            <option selected>Seleccione tipo</option>
                            <?php foreach($selectTipolocal as $item): ?>
                            <option value="<?= $item ?>"> <?= $item ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <x-jet-input-error for="tipolocal" />
                    </div>
                    <div class="text-xs lg:col-span-2">
                        <x-jet-label value="Clasificacion" />
                        <select class="form-control w-full text-sm" wire:model.defer="clasificacion">
                            <option selected>Seleccione clasificacion</option>
                            <?php foreach($selectClasificacion as $item): ?>
                            <option value="<?= $item ?>"> <?= $item ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <x-jet-input-error for="clasificacion" />
                    </div>
                    <div class="text-xs">
                        <x-jet-label value="Prioridad" />
                        <select class="form-control w-full text-sm" wire:model.defer="prioridad">
                            <option selected>Seleccione prioridad</option>
                            <?php foreach($selectPrioridad as $item): ?>
                            <option value="<?= $item ?>"> <?= $item ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <x-jet-input-error for="prioridad" />
                    </div>
                    <div class="text-xs md:col-span-3 lg:col-span-1 xl:col-span-2">
                        <x-jet-label value="Facturacion" />
                        <select class="form-control w-full text-sm" wire:model.defer="facturacion">
                            <option selected>Seleccione facturacion</option>
                            <?php foreach($selectFacturacion as $item): ?>
                            <option value="<?= $item ?>"> <?= $item ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <x-jet-input-error for="Facturacion" />
                    </div>
                    <div class="text-xs lg:col-span-2 xl:col-span-1">
                        <x-jet-label value="Tipo de zona" />
                        <select class="form-control w-full text-sm" wire:model.defer="tipozona">
                            <option selected>Seleccione tipo</option>
                            <?php foreach($selectTipozona as $item): ?>
                            <option value="<?= $item ?>"> <?= $item ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <x-jet-input-error for="tipozona" />
                    </div>
                    <div class="text-xs">
                        <x-jet-label value="SLA Presencia" />
                        <select class="form-control w-full text-sm" wire:model.defer="slapresencia">
                            <option selected>Seleccione SLA</option>
                            <?php foreach($selectSlapresencia as $item): ?>
                            <option value="<?= $item ?>"> <?= $item ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <x-jet-input-error for="slapresencia" />
                    </div>
                    <div class="text-xs">
                        <x-jet-label value="SLA Resolucion" />
                        <select class="form-control w-full text-sm" wire:model.defer="slaresolucion">
                            <option selected>Seleccione SLA</option>
                            <?php foreach($selectSlaresolucion as $item): ?>
                            <option value="<?= $item ?>"> <?= $item ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <x-jet-input-error for="slaresolucion" />
                    </div>
                    <div class="border grid justify-items-center text-center max-h-80 sm:col-span-3 md:row-span-6 md:col-start-4 md:row-start-1 lg:col-span-4 lg:col-start-5 xl:col-span-5 xl:col-start-4">
                        @livewire('users.show-imagenlocal', ['urlimagen' => $urlimagen])
                    </div>
                </div>

                <div class="border-b-2 px-4 py-4 grid  sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6  gap-2">
                    <div class="text-xs">
                        <x-jet-label value="Departamento" />
                        <x-jet-input type="text" class="w-full text-sm" wire:model.defer="departamento" />
                        <x-jet-input-error for="departamento" />
                    </div>
                    <div class="text-xs">
                        <x-jet-label value="Provincia" />
                        <x-jet-input type="text" class="w-full text-sm" wire:model.defer="provincia" />
                        <x-jet-input-error for="provincia" />
                    </div>
                    <div class="text-xs sm:col-span-2 lg:col-span-1" >
                        <x-jet-label value="Distrito" />
                        <x-jet-input type="text" class="w-full text-sm" wire:model.defer="distrito" />
                        <x-jet-input-error for="distrito" />
                    </div>
                    <div class="text-xs sm:col-span-2 md:col-span-4 lg:col-span-3" >
                        <x-jet-label value="Direccion" />
                        <x-jet-input type="text" class="w-full text-sm" wire:model.defer="direccion" />
                        <x-jet-input-error for="direccion" />
                    </div>
                    <div class="text-xs ">
                        <x-jet-label value="Latitud" />
                        <x-jet-input type="text" class="w-full text-sm" wire:model.defer="latitud" />
                        <x-jet-input-error for="latitud" />
                    </div>
                    <div class="text-xs ">
                        <x-jet-label value="Longitud" />
                        <x-jet-input type="text" class="w-full text-sm" wire:model.defer="longitud" />
                        <x-jet-input-error for="longitud" />
                    </div>
                    <div class="text-xs  sm:col-span-2 lg:col-span-4">
                        <x-jet-label class="text-xs" value="Imagen" />
                        <x-jet-input type="text" class="w-full" wire:model.defer="urlimagen" />
                        <x-jet-input-error for="urlimagen" />
                    </div>
                </div>

                <div class="border-b-2 px-4 py-4 grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-2">
                    <div class="text-xs lg:col-span-2">
                        <x-jet-label value="Suministro" />
                        <x-jet-input type="text" class="w-full text-sm" wire:model.defer="suministro" />
                        <x-jet-input-error for="suministro" />
                    </div>
                    <div class="text-xs sm:col-span-2 md:col-span-1 lg:col-span-2">
                        <x-jet-label value="Distribuidor" />
                        <x-jet-input type="text" class="w-full text-sm" wire:model.defer="distribuidor" />
                        <x-jet-input-error for="distribuidor" />
                    </div>
                    <div class="text-xs sm:col-span-3 md:col-span-2  lg:col-span-2">
                        <x-jet-label value="Torrera" />
                        <x-jet-input type="text" class="w-full text-sm" wire:model.defer="torrera" />
                        <x-jet-input-error for="torrera" />
                    </div>
                    <div class="text-xs sm:col-span-3 md:col-span-4 lg:col-span-6">
                        <x-jet-label value="Observaciones" />
                        <x-jet-input type="text" class="w-full text-sm" wire:model.defer="observaciones" />
                        <x-jet-input-error for="observaciones" />
                    </div>
                </div>

            </form>
        {{-- </div> --}}
    </div>

</div>
