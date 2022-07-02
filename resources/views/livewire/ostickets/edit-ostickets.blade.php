<div>
    <div class="max-w-7xl mx-auto sm:px-2 lg:px-4 py-4">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="container">
{{-- 
                <form wire:submit.prevent="submit">
                    <div class="pt-4 px-4 w-full flex justify-between ">
                        <span>TICKETS</span>
                            <x-jet-danger-button type="submit">
                                Guardar
                            </x-jet-danger-button>
                    </div>

                    <div class="p-6 grid  gap-2">
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
                        <div class="{{ $colorEtiquetas }}">
                            <x-jet-label value="Tipo" />
                            <select class="form-control w-full" wire:model.defer="tipo">
                                <option selected>Seleccione tipo</option>
                                <?php foreach($selectTipo as $item): ?>
                                <option value="<?= $item ?>"> <?= $item ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <x-jet-input-error for="tipo" />
                        </div>
                        <div class="{{ $colorEtiquetas }}">
                            <x-jet-label value="Fecha de asignacion" />
                            <x-jet-input type="datetime-local" class="w-full" wire:model.defer="fechaasignacion" />
                            <x-jet-input-error for="fechaasignacion" />
                        </div>
                        <div class="{{ $colorEtiquetas }}">
                            <x-jet-label value="Remedy" />
                            <x-jet-input type="text" class="w-full" wire:model.defer="remedy" />
                            <x-jet-input-error for="remedy" />
                        </div>
                        <div class="{{ $colorEtiquetas }}">
                            <x-jet-label value="Detalle" />
                            <textarea class="form-control w-full" name="detalle" wire:model.defer="detalle" rows="3"></textarea>
                            <x-jet-input-error for="detalle" />
                        </div>
                    </div>

                    <!-- ACA VAN LAS PR -->

                    <div class="p-6 grid  gap-2">
                        <div class="{{ $colorEtiquetas }}">
                            <x-jet-label value="Fecha de llegada" />
                            <x-jet-input type="datetime-local" class="w-full" wire:model.defer="fechallegada" />
                            <x-jet-input-error for="fechallegada" />
                        </div>
                        <div class="{{ $colorEtiquetas }} ">
                            <x-jet-label value="Fecha de cierre" />
                            <x-jet-input type="datetime-local" class="w-full" wire:model.defer="fechacierre" />
                            <x-jet-input-error for="fechacierre" />
                        </div>
                        <div class="{{ $colorEtiquetas }} ">
                            <x-jet-label value="Cierre" />
                            <textarea class="form-control w-full" name="detalle" wire:model.defer="cierre" rows="3"></textarea>
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

                </form> --}}


                <div class="p-4 grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-2">
                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="ACTUACIONES" />
                    </div>
                    <div>
                        @livewire('actions.create-actions', ['osticket_id' => $osticket_id])
                    </div>
                </div>
                <div class="p-4 gap-2">
                    <div class="table w-full ">
                        <div class="table-header-group">
                            <div class="table-row">
                                <div class="{{ $colorEtiquetas }} table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Usuario
                                </div>
                                <div class="{{ $colorEtiquetas }} table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Fecha
                                </div>
                                <div class="{{ $colorEtiquetas }} table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Detalle
                                </div>
                                <div class="{{ $colorEtiquetas }} max-w-[50px] table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider relative">
                                    Act
                                </div>
                                <div class="{{ $colorEtiquetas }} max-w-[50px] table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider relative">
                                    Elim
                                </div>
                            </div>
                        </div>
                        <div class="table-row-group">
                            @foreach ($actiontable as $item2)
                                <div class="table-row ">
                                    <div class="align-middle text-left table-cell px-2 py-2 border-b-2 border-gray-300 bg-white text-sm text-gray-900 whitespace-no-wrap">
                                        {{ $item2->user_id }}
                                    </div>
                                    <div class="align-middle text-left table-cell px-2 py-2 border-b-2 border-gray-300 bg-white text-sm text-gray-900 whitespace-no-wrap">
                                        {{ $item2->created_at }}
                                    </div>
                                    <div class="max-w-[800px] align-middle text-left table-cell px-2 py-2 border-b-2 border-gray-300 bg-white text-sm text-gray-900 whitespace-no-wrap">
                                        {{ $item2->detalle }}
                                    </div>
                                    <div class="max-w-[50px] align-middle text-center table-cell px-1 py-3 border-b-2 border-gray-300 bg-white text-sm text-gray-900 whitespace-no-wrap">
                                        <a class="btn btn-green" wire:click="editAction({{ $item2 }})">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                    </div>
                                    <div class="max-w-[50px] align-middle text-center table-cell px-1 py-3 border-b-2 border-gray-300 bg-white text-sm text-gray-900 whitespace-no-wrap">
                                        <a class="btn btn-red ml-2" wire:click="$emit('borrarActuacion', {{ $item2->id }})">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>



    @push('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- $site->id -->
        <script>
            livewire.on('borrarActuacion', ticketId => {
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "El registro se borarrá permanentemente",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, borrar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        livewire.emitTo('ostickets.edit-ostickets', 'deleteAction', ticketId);
                        Swal.fire(
                            'Hecho!',
                            'El registro fue eliminado',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush
    <x-jet-dialog-modal wire:model="open_editaction">
        <x-slot name="title">
            Editar actuacion
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Detalle" />
                <x-jet-input type="text" class="w-full" wire:model="action.detalle" />
                <x-jet-input-error for="detalle" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button class="mr-2" wire:click="$set('open_editaction', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button class="mr-2" wire:click="updateAction" wire:loading.attr="disabled" wire:target="updateAction" class="disabled:opacity-25">
                Guardar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>



