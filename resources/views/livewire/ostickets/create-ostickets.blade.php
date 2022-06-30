{{-- <p>{{ Auth::user()->name }}</p>
<p>{{ $item }}</p> --}}
{{-- <p>{{ $item->id }}</p> --}}

@can('ostickets.index')
    <div class="max-w-7xl mx-auto sm:px-2 lg:px-4 py-4">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="container">
                {{-- @can('ostickets.create') --}}
                <form wire:submit.prevent="submit">
                    {{-- @endcan --}}
                    <div class="pt-4 px-4 w-full flex justify-between ">
                        <span>TICKETS</span>
                        @can('ostickets.create')
                            <x-jet-danger-button type="submit">
                                Guardar
                            </x-jet-danger-button>
                        @endcan
                    </div>

                    <div class="p-6 grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-2">
                        <div class="{{ $colorEtiquetas }}">
                            <x-jet-label value="ID local" />
                            <x-jet-input type="text" class="w-full" wire:model.defer="site_id" />
                            <x-jet-input-error for="site_id" />
                        </div>

                        <div class="{{ $colorEtiquetas }}">
                            <x-jet-label value="Siom" />
                            <x-jet-input type="text" class="w-full" wire:model.defer="siom" />
                            <x-jet-input-error for="siom" />
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
                            <x-jet-label value="Tipo" />
                            <select class="form-control w-full" wire:model.defer="tipo">
                                <option selected>Seleccione tipo</option>
                                <?php foreach($selectTipo as $item): ?>
                                <option value="<?= $item ?>"> <?= $item ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <x-jet-input-error for="tipo" />
                        </div>

                        <div class="{{ $colorEtiquetas }} sm:col-span-3 md:col-span-2 lg:col-span-3">
                            <x-jet-label value="Fecha de asignacion" />
                            <x-jet-input type="text" class="w-full" wire:model.defer="fechaasignacion" />
                            <x-jet-input-error for="fechaasignacion" />
                        </div>

                        <div class="{{ $colorEtiquetas }} sm:col-span-3 md:col-span-2 lg:col-span-3">
                            <x-jet-label value="Remedy" />
                            <x-jet-input type="text" class="w-full" wire:model.defer="remedy" />
                            <x-jet-input-error for="remedy" />
                        </div>

                        <div class="{{ $colorEtiquetas }} sm:col-span-3 md:col-span-2 lg:col-span-3">
                            <x-jet-label value="Detalle" />
                            <x-jet-input type="text" class="w-full" wire:model.defer="detalle" />
                            <x-jet-input-error for="detalle" />
                        </div>
                    </div>

                    <div class="p-4 gap-2">
                        <div class="table w-full ">
                            <div class="table-header-group">
                                <div class="table-row">
                                    <div
                                        class="{{ $colorEtiquetas }} table-cell  text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Inicio
                                    </div>
                                    <div
                                        class="{{ $colorEtiquetas }} table-cell  text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Fin
                                    </div>
                                    <div
                                        class="{{ $colorEtiquetas }} table-cell  text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Motivo
                                    </div>
                                    <div
                                        class="{{ $colorEtiquetas }} table-cell  text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Sustento
                                    </div>
                                </div>
                            </div>
                            <div class="table-row-group">
                                @foreach ($clockstop as $item3)
                                    <div class="table-row ">
                                        <div
                                            class="align-middle text-left table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-sm text-gray-900 whitespace-no-wrap">
                                            {{ $item3->inicio }}
                                        </div>
                                        <div
                                            class="align-middle text-left table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-sm text-gray-900 whitespace-no-wrap">
                                            {{ $item3->fin }}
                                        </div>
                                        <div
                                            class="align-middle text-left table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-sm text-gray-900 whitespace-no-wrap">
                                            {{ $item3->motivo }}
                                        </div>
                                        <div
                                            class="align-middle text-left table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-sm text-gray-900 whitespace-no-wrap">
                                            {{ $item3->sustento }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-4 gap-2">
                        <div class="table w-full ">
                            <div class="table-header-group">
                                <div class="table-row">
                                    <div class="{{ $colorEtiquetas }} table-cell  text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Usuario
                                    </div>
                                    <div class="{{ $colorEtiquetas }} table-cell  text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Fecha
                                    </div>
                                    <div class="{{ $colorEtiquetas }} table-cell  text-center px-3 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Detalle
                                    </div>
                                </div>
                            </div>
                            <div class="table-row-group">
                                @foreach ($action as $item2)
                                    <div class="table-row ">
                                        <div class="align-middle text-left table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-sm text-gray-900 whitespace-no-wrap">
                                            {{ $item2->user_id }}
                                        </div>
                                        <div class="align-middle text-left table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-sm text-gray-900 whitespace-no-wrap">
                                            {{ $item2->created_at }}
                                        </div>
                                        <div class="align-middle text-left table-cell px-3 py-3 border-b-2 border-gray-300 bg-white text-sm text-gray-900 whitespace-no-wrap">
                                            {{ $item2->detalle }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="p-6 grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-2">
                        <div class="{{ $colorEtiquetas }} sm:col-span-3 md:col-span-2 lg:col-span-3">
                            <x-jet-label value="Fecha de llegada" />
                            <x-jet-input type="text" class="w-full" wire:model.defer="fechallegada" />
                            <x-jet-input-error for="fechallegada" />
                        </div>

                        <div class="{{ $colorEtiquetas }} sm:col-span-3 md:col-span-2 lg:col-span-3">
                            <x-jet-label value="Fecha de cierre" />
                            <x-jet-input type="text" class="w-full" wire:model.defer="fechacierre" />
                            <x-jet-input-error for="fechacierre" />
                        </div>

                        <div class="{{ $colorEtiquetas }} sm:col-span-3 md:col-span-2 lg:col-span-3">
                            <x-jet-label value="Cierre" />
                            <x-jet-input type="text" class="w-full" wire:model.defer="cierre" />
                            <x-jet-input-error for="cierre" />
                        </div>

                        <div class="{{ $colorEtiquetas }}">
                            <x-jet-label value="Categoria" />
                            <select class="form-control w-full" wire:model.defer="categoria">
                                <option selected>Seleccione categoria</option>
                                <?php foreach($selectCategoria as $item): ?>
                                <option value="<?= $item ?>"> <?= $item ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <x-jet-input-error for="categoria" />
                        </div>

                        <div class="{{ $colorEtiquetas }}">
                            <x-jet-label value="Resultado Presencia" />
                            <select class="form-control w-full" wire:model.defer="resultadoslap">
                                <option selected>Seleccione SLA</option>
                                <?php foreach($selectResultado as $item): ?>
                                <option value="<?= $item ?>"> <?= $item ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <x-jet-input-error for="resultadoslap" />
                        </div>

                        <div class="{{ $colorEtiquetas }}">
                            <x-jet-label value="Resultado Resolucion" />
                            <select class="form-control w-full" wire:model.defer="resultadoslar">
                                <option selected>Seleccione SLA</option>
                                <?php foreach($selectResultado as $item): ?>
                                <option value="<?= $item ?>"> <?= $item ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <x-jet-input-error for="resultadoslar" />
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>


@endcan
