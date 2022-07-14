<div>
    <div class="max-w-7xl mx-auto sm:px-2 lg:px-4 py-4">
        <div class="bg-gray-300 overflow-hidden shadow-xl sm:rounded-lg">

            @can('ostickets.create')
            <form wire:submit.prevent="submit">
            @endcan
                <div class="p-2 w-full flex justify-between bg-gray-800 text-white items-center">
                    <span class="px-2">TICKETS</span>
                    @can('ostickets.create')
                        <x-jet-button type="submit" class="bg-blue-700">
                            Guardar
                        </x-jet-button>
                    @endcan
                </div>

                <div >

                    <!-------------- DATOS DE LOCAL ---------------------->
                    <div class="border-b-2 p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-7 lg:grid-cols-7 gap-2">
                        <div class="sm:col-span-1	md:col-span-1">
                            <x-jet-label value="ID local" />
                            <x-jet-input type="text" class="w-full text-sm" wire:model.defer="site_id" />
                            <x-jet-input-error for="site_id" />
                        </div>
                        <div class="">
                            <x-jet-label value="Zonal" />
                            <x-jet-input type="text" class="w-full text-sm" wire:model.defer="localzonal" readonly/>
                        </div>
                        <div class="sm:col-span-2	md:col-span-3 lg:col-span-2">
                            <x-jet-label value="Nombre" />
                            <x-jet-input type="text" class="w-full text-sm" wire:model.defer="localnombre" readonly/>
                        </div>
                        <div class="sm:col-span-2 lg:col-span-1">
                            <x-jet-label value="Prioridad" />
                            <x-jet-input type="text" class="w-full text-sm" wire:model.defer="localprioridad" readonly/>
                        </div>
                        <div class="">
                            <x-jet-label value="Presencia" />
                            <x-jet-input type="text" class="w-full text-sm" wire:model.defer="localslap" readonly/>
                        </div>
                        <div class="">
                            <x-jet-label value="Resolucion" />
                            <x-jet-input type="text" class="w-full text-sm" id="localslar" wire:model.defer="localslar" readonly/>
                        </div>
                        <div class="md:col-span-2 lg:col-span-1">
                            <x-jet-label value="Duracion sin PR" />
                            <x-jet-input type="text" class="w-full text-sm" id="duracionticket" wire:model.defer="duracionticket" readonly/>
                        </div>
                        <div class="md:col-span-2 lg:col-span-1">
                            <x-jet-label value="Duracion con PR" />
                            {{-- <x-jet-input type="text" class="w-full text-sm" id="duracionticketconpr" readonly/> --}}
                            <x-jet-input type="text" class="w-full text-sm" value="{{convertirHora(convertirSegundos($this->duracionticket) - $this->duracionprseg)}}" readonly/>
                        </div>
                        <div class="">
                            <x-jet-label value="Cantidad de PR" />
                            <x-jet-input type="text" class="w-full text-sm" wire:model.defer="cantidadpr" readonly/>
                        </div>
                        <div class="md:col-span-2 lg:col-span-1">
                            <x-jet-label value="Duracion de PR" />
                            <x-jet-input type="text" class="w-full text-sm" value="{{convertirHora($this->duracionprseg)}}" readonly/>
                            {{-- <x-jet-input type="text" class="w-full text-sm" id="duracionprseg" wire:model.defer="duracionprseg" readonly/>  --}}
                        </div>
                        <div class="md:col-span-2 lg:col-span-1">
                            <x-jet-label value="Res. Toda Causa" />
                            {{-- <x-jet-input type="text" class="w-full" id="resultadotodacausa" readonly/> --}}
                            <x-jet-input type="text" class="w-full text-sm" value="{{calculoSla($this->estado, convertirSegundos($this->localslar),convertirSegundos($this->duracionticket) )}}" readonly/>
                        </div>
                        <div class="md:col-span-2 lg:col-span-1">
                            <x-jet-label value="Resul. c/Pr" />
                            {{-- <x-jet-input type="text" class="w-full text-sm" id="resultadoconpr" readonly/> --}}
                            <x-jet-input type="text" class="w-full text-sm" id="resultadoconpr" value="{{calculoSla($this->estado, convertirSegundos($this->localslar),(convertirSegundos($this->duracionticket) - $this->duracionprseg) )}}"/>
                        </div>
                        <div class="sm:col-span-2 md:col-span-1 grid content-center">
                            <x-jet-label class="text-gray-300" value="." />
                            <a class="btn btn-red inline-flex items-center justify-center  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition"
                            href="{{ route('sites.edit', $osticket->site_id) }}" target="_blank">
                                Detalle local
                            </a>
                        </div>
                    </div>

                    <!-------------- DATOS DE INICIO ---------------------->
                    <div class="border-b-2 p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-10 gap-2">
                        <div class="">
                            <x-jet-label value="Siom" />
                            <x-jet-input type="text" class="w-full text-sm" wire:model.defer="siom" />
                            <x-jet-input-error for="siom" />
                        </div>
                        <div class="lg:col-span-2">
                            <x-jet-label value="Remedy" />
                            <x-jet-input type="text" class="w-full text-sm" wire:model.defer="remedy" />
                            <x-jet-input-error for="remedy" />
                        </div>
                        <div class="md:col-span-2">
                            <x-jet-label value="Estado" />
                            <select class="form-control w-full text-sm" wire:model.defer="estado">
                                <option selected>Seleccione estado</option>
                                <?php foreach($selectEstado as $item): ?>
                                <option value="<?= $item ?>"> <?= $item ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <x-jet-input-error for="estado" />
                        </div>
                        <div class="lg:col-span-2">
                            <x-jet-label value="Fecha de asignacion" />
                            <x-jet-input type="datetime-local" class="w-full text-sm" wire:model.defer="fechaasignacion" id="fechaasignacion"/>
                            <x-jet-input-error for="fechaasignacion" />
                        </div>
                        <div class="md:col-span-2">
                            <x-jet-label value="Tipo" />
                            <select class="form-control w-full text-sm" wire:model.defer="tipo">
                                <option selected>Seleccione tipo</option>
                                <?php foreach($selectTipo as $item): ?>
                                <option value="<?= $item ?>"> <?= $item ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <x-jet-input-error for="tipo" />
                        </div>
                        <div>
                            <x-jet-label class="text-gray-300" value="." />
                            <a class="btn btn-red inline-flex items-center justify-center  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition"
                            wire:click="copiarDetalles()">
                                Resumen
                            </a>
                        </div>


                        <div class="sm:col-span-3 md:col-span-4 lg:col-span-10">
                            <x-jet-label value="Detalle" />
                            <textarea class="form-control w-full text-sm" id="detalle" name="detalle" wire:model.defer="detalle" rows="4"></textarea>
                            <x-jet-input-error for="detalle" />
                        </div>
                    </div>

                    <!-------------- PARADAS DE RELOJ ---------------------->
                    <div class="p-4 border-b-2 gap-2">
                        <div class="flex justify-between items-center">
                            <x-jet-label value="PARADAS DE RELOJ" class="font-bold"/>
                            @can('clockstops.create')
                                @livewire('clockstops.create-clockstops', ['osticket_id' => $osticket_id, 'fechaasignacion' => $fechaasignacion])
                            @endcan
                        </div>
                        <div class="pt-4">
                            <div class="table w-full">
                                <div class="table-header-group">
                                    <div class="table-row text-sm">
                                        <div class="table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider">
                                            Estado
                                        </div>
                                        <div class="table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider">
                                            Inicio
                                        </div>
                                        <div class="table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider">
                                            Fin
                                        </div>
                                        <div class="table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider">
                                            Durac.
                                        </div>
                                        <div class="table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider">
                                            Motivo
                                        </div>
                                        <div class="table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider">
                                            Sustento
                                        </div>
                                        @can('clockstops.create')
                                            <div class="max-w-[50px] table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider relative">
                                                Act
                                            </div>
                                        @endcan
                                        @can('clockstops.destroy')
                                            <div class="max-w-[50px] table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider relative">
                                                Elim
                                            </div>
                                        @endcan
                                    </div>
                                </div>
                                <div class="table-row-group">
                                    @foreach ($clockstoptable as $item3)
                                        <div class="table-row text-sm">
                                            <div class="align-middle text-left table-cell px-2 py-2 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap ">
                                                @if($item3->fin > 0)
                                                    <div class="mx-2 flex place-content-center font-bold bg-green-400 text-gray-900 whitespace-no-wrap">
                                                        <p>Cerrado</p>
                                                    </div>
                                                @else
                                                    <div class="mx-2 flex place-content-center font-bold bg-yellow-500 text-gray-50 whitespace-no-wrap">
                                                        <p>Abierto</p>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="align-middle text-left table-cell px-2 py-2 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                                {{ date('d/m/Y H:i', strtotime($item3->inicio )) }}
                                            </div>
                                            <div class="align-middle text-left table-cell px-2 py-2 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                                {{ !empty($item3->fin) ? date('d/m/Y H:i', strtotime($item3->fin )) : '' }}
                                            </div>
                                            <div class="align-middle text-left table-cell px-2 py-2 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                                {{ round(($item3->duracion)/3600,1) . ' hrs' }}
                                            </div>
                                            <div class="max-w-[800px] align-middle text-left table-cell px-2 py-2 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                                {{ $item3->motivo }}
                                            </div>
                                            <div class="max-w-[800px] align-middle text-left table-cell px-2 py-2 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                                {{ $item3->sustento }}
                                            </div>
                                            @can('clockstops.create')
                                                <div class="max-w-[50px] align-middle text-center table-cell px-1 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                                    <a class="btn btn-green" wire:click="editClockstop({{ $item3->id }})">
                                                        <i class="fa-solid fa-edit"></i>
                                                    </a>
                                                </div>
                                            @endcan
                                            @can('clockstops.destroy')
                                                <div class="max-w-[50px] align-middle text-center table-cell px-1 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                                    <a class="btn btn-red" wire:click="$emit('borrarPR', {{ $item3->id }})">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </div>
                                            @endcan
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-------------- CIERRE ---------------------->
                    <div class="border-b-2 p-4 text-sm grid grid-cols-1 sm:grid-row-3 sm:grid-cols-3 lg:grid-cols-12 gap-2">
                        <div class="lg:col-span-3">
                            <x-jet-label value="Fecha de llegada" />
                            <x-jet-input type="datetime-local" class="w-full text-sm" wire:model.defer="fechallegada" />
                            <x-jet-input-error for="fechallegada" />
                        </div>
                        <div class="lg:col-span-3">
                            <x-jet-label value="Fecha de cierre" />
                            <x-jet-input type="datetime-local" class="w-full text-sm" wire:model.defer="fechacierre" id="fechacierre" />
                            <x-jet-input-error for="fechacierre" />
                        </div>
                        <div class="sm:row-span-2 sm:col-span-2 sm:row-start-1 sm:col-start-2 lg:col-span-9 lg-row-span-2 lg:col-start-4 lg:row-start-1">
                            <x-jet-label value="Cierre" />
                            <textarea class="form-control w-full text-sm" name="detalle" wire:model.defer="cierre" rows="4"></textarea>
                            <x-jet-input-error for="cierre" />
                        </div>
                        <div class="lg:col-span-6">
                            <x-jet-label value="Categoria" />
                            <select class="form-control w-full text-sm" wire:model.defer="categoria">
                                <option selected>Seleccione categoria</option>
                                <?php foreach($selectCategoria as $item): ?>
                                <option value="<?= $item ?>"> <?= $item ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <x-jet-input-error for="categoria" />
                        </div>
                        <div class="lg:col-span-3">
                            <x-jet-label value="Resultado Presencia" />
                            <select class="form-control w-full text-sm" wire:model.defer="resultadoslap">
                                <option selected>Seleccione SLA</option>
                                <?php foreach($selectResultado as $item): ?>
                                <option value="<?= $item ?>"> <?= $item ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <x-jet-input-error for="resultadoslap" />
                        </div>
                        <div class="lg:col-span-3">
                            <x-jet-label value="Resultado Resolucion" />
                            <select id="selecresultado" class="form-control w-full text-sm" wire:model.defer="resultadoslar">
                                <option selected>Seleccione SLA</option>
                                <?php foreach($selectResultado as $item): ?>
                                <option value="<?= $item ?>"> <?= $item ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <x-jet-input-error for="resultadoslar" />
                        </div>
                    </div>
                </div>
            </form>
                <!--------ACTUACIONESA-------------->
                <div class="p-4 border-b-2 gap-2">
                    <div class="flex justify-between items-center">
                        <x-jet-label value="ACTUACIONES" class="font-bold" />
                        @can('actions.create')
                            @livewire('actions.create-actions', ['osticket_id' => $osticket_id])
                        @endcan
                    </div>

                    <div class="pt-4">
                        <div class="table w-full ">
                            <div class="table-header-group">
                                <div class="table-row text-sm">
                                    <div class="table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider">
                                        Usuario
                                    </div>
                                    <div class="table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider">
                                        Fecha
                                    </div>
                                    <div class="table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider">
                                        Detalle
                                    </div>
                                    @can('actions.destroy')
                                        <div class="max-w-[50px] table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider relative">
                                            Act
                                        </div>
                                        <div class="max-w-[50px] table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider relative">
                                            Elim
                                        </div>
                                    @endcan
                                </div>
                            </div>
                            <div class="table-row-group">
                                @foreach ($actiontable as $item2)
                                    <div class="table-row text-sm">
                                        <div class="align-middle text-left table-cell px-2 py-2 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                            {{ $item2->name }}
                                        </div>
                                        <div class="align-middle text-left table-cell px-2 py-2 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                            {{ date('d/m/Y H:i', strtotime($item2->created_at)) }}
                                        </div>
                                        <div class="max-w-[800px] align-middle text-left table-cell px-2 py-2 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                            {{ $item2->detalle }}
                                        </div>
                                        @can('actions.destroy')
                                            <div class="max-w-[50px] align-middle text-center table-cell px-1 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                                <a class="btn btn-green" wire:click="editAction({{ $item2 }})">
                                                    <i class="fa-solid fa-edit"></i>
                                                </a>
                                            </div>
                                            <div class="max-w-[50px] align-middle text-center table-cell px-1 py-3 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap">
                                                <a class="btn btn-red" wire:click="$emit('borrarActuacion', {{ $item2->id }})">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </div>
                                        @endcan
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
            livewire.on('borrarPR', ticketId => {
                Swal.fire({
                    title: '¿Estas seguro de borrar?',
                    text: "El registro se borarrá permanentemente",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, borrar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        livewire.emitTo('ostickets.edit-ostickets', 'deleteClockStop', ticketId);
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
                <x-jet-input type="text" class="w-full text-sm" wire:model="action.detalle" />
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

    <x-jet-dialog-modal wire:model="open_editclockstop">
        <x-slot name="title">
            Editar parada de reloj
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Fecha inicio" />
                <x-jet-input type="datetime-local" class="w-full text-sm" wire:model.defer="clockstop.inicio" />
                <x-jet-input-error for="inicio" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Fecha fin" />
                <x-jet-input type="datetime-local" class="w-full text-sm" wire:model.defer="clockstop.fin" />
                <x-jet-input-error for="fin" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Motivo" />
                <select class="form-control w-full" wire:model.defer="clockstop.motivo">
                    <?php foreach($selectMotivo as $item): ?>
                    <option value="<?= $item ?>"> <?= $item ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-4">
                <x-jet-label value="Sustento" />
                <x-jet-input type="text" class="w-full text-sm" wire:model.defer="clockstop.sustento" />
                <x-jet-input-error for="sustento" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="mr-2" wire:click="$set('open_editclockstop', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button class="mr-2" wire:click="updateClockstop" wire:loading.attr="disabled" wire:target="updateClockstop" class="disabled:opacity-25">
                Guardar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>


    <x-jet-dialog-modal wire:model="open_details">
        <x-slot name="title">
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Detalles para enviar" />
                <textarea class="form-control w-full text-xs text-gray-800" wire:model.defer="pruebadetalle" rows="20"></textarea>
            </div>
        </x-slot>

        <x-slot name="footer">

        </x-slot>
    </x-jet-dialog-modal>

</div>
