<div>
    <div class="max-w-7xl mx-auto sm:px-2 lg:px-4 py-4">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        @can('ostickets.create')
            <form wire:submit.prevent="submit">
        @endcan
            <div   class="pt-4 px-4 w-full flex justify-between ">
                <span>TICKETS</span>
                @can('ostickets.create')
                    <x-jet-danger-button type="submit">
                        Guardar
                    </x-jet-danger-button>
                @endcan
            </div>
            <div>
            <div x-data="indicadores()"  x-init="kpidetalleos()">

                <!-------------- DATOS DE LOCAL ---------------------->
                <div class="p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6">
                    <div class="{{ $colorEtiquetas }} sm:col-span-1	md:col-span-1">
                        <x-jet-label value="ID local" />
                        <x-jet-input type="text" class="w-full text-sm" wire:model.defer="site_id" />
                        <x-jet-input-error for="site_id" />
                    </div>
                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="Zonal" />
                        <x-jet-input type="text" class="w-full text-sm" wire:model.defer="localzonal" readonly/>
                    </div>
                    <div class="{{ $colorEtiquetas }} sm:col-span-2	md:col-span-2">
                        <x-jet-label value="Nombre" />
                        <x-jet-input type="text" class="w-full text-sm" wire:model.defer="localnombre" readonly/>
                    </div>
                    <div class="{{ $colorEtiquetas }} md:col-span-1 ">
                        <x-jet-label value="Prioridad" />
                        <x-jet-input type="text" class="w-full text-sm" wire:model.defer="localprioridad" readonly/>
                    </div>
                    <div class="{{ $colorEtiquetas }} ">
                        <x-jet-label value="Presencia" />
                        <x-jet-input type="text" class="w-full text-sm" wire:model.defer="localslap" readonly/>
                    </div>
                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="Resolucion" />
                        <x-jet-input type="text" class="w-full text-sm" id="localslar" wire:model.defer="localslar" readonly/>
                    </div>
                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="Duracion sin PR" />
                        <x-jet-input type="text" class="w-full text-sm" id="duracionticket" wire:model.defer="duracionticket" readonly/>
                    </div>
                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="Duracion con PR" />
                        <x-jet-input type="text" class="w-full text-sm" id="duracionticketconpr" readonly/>
                    </div>
                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="Cantidad de PR" />
                        <x-jet-input type="text" class="w-full text-sm" wire:model.defer="cantidadpr" readonly/>
                    </div>
                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="Duracion de PR" />
                        <x-jet-input type="text" class="w-full text-sm" id="duracionprseg" wire:model.defer="duracionprseg" readonly/>
                    </div>
                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="Res. Toda Causa" />
                        <x-jet-input type="text" class="w-full text-sm" id="resultadotodacausa" readonly/>
                    </div>
                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="Resul. c/Pr" />
                        <x-jet-input type="text" class="w-full text-sm" id="resultadoconpr" readonly/>
                    </div>
                    {{-- <p> cuantas h van, cuantas quedan,  resumen de la pr + acumulado, estadao automatico dentro fuera</p> --}}

                </div>

                <!-------------- DATOS DE INICIO ---------------------->
                <div class="p-4 grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 text-sm">
                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="Siom" />
                        <x-jet-input type="text" class="w-full text-sm" wire:model.defer="siom" />
                        <x-jet-input-error for="siom" />
                    </div>
                    <div class="{{ $colorEtiquetas }} ">
                        <x-jet-label value="Remedy" />
                        <x-jet-input type="text" class="w-full text-sm" wire:model.defer="remedy" />
                        <x-jet-input-error for="remedy" />
                    </div>
                    <div class="{{ $colorEtiquetas }} md:col-span-2 lg:col-span-1">
                        <x-jet-label value="Estado" />
                        <select class="form-control w-full text-sm" wire:model.defer="estado">
                            <option selected>Seleccione estado</option>
                            <?php foreach($selectEstado as $item): ?>
                            <option value="<?= $item ?>"> <?= $item ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <x-jet-input-error for="estado" />
                    </div>
                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="Fecha de asignacion" />
                        <x-jet-input type="datetime-local" class="w-full text-sm" wire:model.defer="fechaasignacion" id="fechaasignacion"/>
                        {{-- <input type="da
                        tetime-local" class="w-full text-sm" x-model="vars.inicio"/>
                        <p x-text="vars.inicio"></p> --}}
                        <x-jet-input-error for="fechaasignacion" />
                    </div>
                    <div class="{{ $colorEtiquetas }} sm:col-span-2 md:col-span-3 lg:col-span-1">
                        <x-jet-label value="Tipo" />
                        <select class="form-control w-full text-sm" wire:model.defer="tipo">
                            <option selected>Seleccione tipo</option>
                            <?php foreach($selectTipo as $item): ?>
                            <option value="<?= $item ?>"> <?= $item ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <x-jet-input-error for="tipo" />
                    </div>
                    <div class="{{ $colorEtiquetas }} sm:col-span-3 md:col-span-4 lg:col-span-6">
                        <x-jet-label value="Detalle" />
                        <textarea class="form-control w-full text-sm" name="detalle" wire:model.defer="detalle" rows="4"></textarea>
                        <x-jet-input-error for="detalle" />
                    </div>
                </div>

                <!-------------- PARADAS DE RELOJ ---------------------->
                <div class="px-4 w-full flex justify-between">
                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="PARADAS DE RELOJ" />
                    </div>
                    <div>
                        @can('clockstops.create')
                            @livewire('clockstops.create-clockstops', ['osticket_id' => $osticket_id, 'fechaasignacion' => $fechaasignacion])
                        @endcan
                    </div>
                </div>
                <div class="px-4 py-2 gap-2">
                    <div class="table w-full ">
                        <div class="table-header-group">
                            <div class="table-row text-sm">
                                <div class="{{ $colorEtiquetas }} table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider">
                                    Estado
                                </div>
                                <div class="{{ $colorEtiquetas }} table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider">
                                    Inicio
                                </div>
                                <div class="{{ $colorEtiquetas }} table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider">
                                    Fin
                                </div>
                                <div class="{{ $colorEtiquetas }} table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider">
                                    Durac.
                                </div>
                                <div class="{{ $colorEtiquetas }} table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider">
                                    Motivo
                                </div>
                                <div class="{{ $colorEtiquetas }} table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider">
                                    Sustento
                                </div>
                                @can('clockstops.create')
                                    <div class="{{ $colorEtiquetas }} max-w-[50px] table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider relative">
                                        Act
                                    </div>
                                @endcan
                                @can('clockstops.destroy')
                                    <div class="{{ $colorEtiquetas }} max-w-[50px] table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider relative">
                                        Elim
                                    </div>
                                @endcan
                            </div>
                        </div>
                        <div class="table-row-group">
                            {{-- {{$clockstoptable}} --}}
                            @foreach ($clockstoptable as $item3)
                                <div class="table-row text-sm">
                                    <div class="align-middle text-left table-cell px-2 py-2 border-b-2 border-gray-300 bg-white text-gray-900 whitespace-no-wrap text-xs">
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
                                        {{-- {{ Carbon::parse($item3->inicio)->diffInHours(Carbon::parse($item3->fin)) . ':' . Carbon::parse($item3->inicio)->diff(Carbon::parse($item3->fin))->format('%I') }} --}}
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

                        <script>
                        </script>

                    </div>
                </div>

                <!-------------- CIERRE ---------------------->
                    <div class="p-4 grid grid-cols-1 sm:grid-row-3 sm:grid-cols-3 lg:grid-cols-12 gap-2">
                        <div class="{{ $colorEtiquetas}} lg:col-span-3">
                            <x-jet-label value="Fecha de llegada" />
                            <x-jet-input type="datetime-local" class="w-full text-sm" wire:model.defer="fechallegada" />
                            <x-jet-input-error for="fechallegada" />
                        </div>
                        <div class="{{ $colorEtiquetas }} lg:col-span-3">
                            <x-jet-label value="Fecha de cierre" />
                            <x-jet-input type="datetime-local" class="w-full text-sm" wire:model.defer="fechacierre" id="fechacierre" />
                            <x-jet-input-error for="fechacierre" />
                        </div>
                        <div class="{{ $colorEtiquetas }} sm:row-span-2 sm:col-span-2 sm:row-start-1 sm:col-start-2
                                                lg:col-span-9 lg-row-span-2 lg:col-start-4 lg:row-start-1">
                            <x-jet-label value="Cierre" />
                            <textarea class="form-control w-full" name="detalle" wire:model.defer="cierre" rows="4"></textarea>
                            <x-jet-input-error for="cierre" />
                        </div>
                        <div class="{{ $colorEtiquetas }} lg:col-span-6">
                            <x-jet-label value="Categoria" />
                            <select class="form-control w-full text-sm" wire:model.defer="categoria">
                                <option selected>Seleccione categoria</option>
                                <?php foreach($selectCategoria as $item): ?>
                                <option value="<?= $item ?>"> <?= $item ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <x-jet-input-error for="categoria" />
                        </div>
                        <div class="{{ $colorEtiquetas }} lg:col-span-3">
                            <x-jet-label value="Resultado Presencia" />
                            <select class="form-control w-full text-sm" wire:model.defer="resultadoslap">
                                <option selected>Seleccione SLA</option>
                                <?php foreach($selectResultado as $item): ?>
                                <option value="<?= $item ?>"> <?= $item ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <x-jet-input-error for="resultadoslap" />
                        </div>
                        <div class="{{ $colorEtiquetas }} lg:col-span-3">
                            <x-jet-label value="Resultado Resolucion" />
                            <select class="form-control w-full text-sm" wire:model.defer="resultadoslar">
                                <option selected>Seleccione SLA</option>
                                <?php foreach($selectResultado as $item): ?>
                                <option value="<?= $item ?>"> <?= $item ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <x-jet-input-error for="resultadoslar" />
                        </div>
                    </div>
                </form>

                    <!--------ACTUACIONESA-------------->
                <div class="px-4 w-full flex justify-between">
                    <div class="{{ $colorEtiquetas }}">
                        <x-jet-label value="ACTUACIONES" />
                    </div>
                    @can('actions.create')
                        <div>
                            @livewire('actions.create-actions', ['osticket_id' => $osticket_id])
                        </div>
                    @endcan
                </div>
                <div class="p-4 gap-2">
                    <div class="table w-full ">
                        <div class="table-header-group">
                            <div class="table-row text-sm">
                                <div class="{{ $colorEtiquetas }} table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider">
                                    Usuario
                                </div>
                                <div class="{{ $colorEtiquetas }} table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider">
                                    Fecha
                                </div>
                                <div class="{{ $colorEtiquetas }} table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider">
                                    Detalle
                                </div>
                                @can('actions.destroy')
                                    <div class="{{ $colorEtiquetas }} max-w-[50px] table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider relative">
                                        Act
                                    </div>
                                    <div class="{{ $colorEtiquetas }} max-w-[50px] table-cell  text-center px-2 py-2 border-b-2 border-gray-200 bg-gray-100 font-semibold text-gray-600 tracking-wider relative">
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

    {{-- <script>
        function prueba() {
            return {
                vars: {
                    inicio: document.getElementById('fechaasignacion').value,
                    fin:    document.getElementById('fechacierre').value,
                    a: null,
                    b: null,
                },
                start() {
                    if (!document.getElementById('fechacierre').value) {
                        duracionms = Date.now() - Date.parse(document.getElementById('fechaasignacion').value);
                    } else {
                        duracionms = Date.parse(document.getElementById('fechacierre').value) - Date.parse(document.getElementById('fechaasignacion').value);
                    }
                    console.log(duracionms)
                    let hours = Math.floor(duracionms / (60*60*1000));
                    hours < 10 ? hours = "0" + hours : hours;
                    const hoursms = duracionms % (60*60*1000);
                    let  minutes = Math.floor(hoursms / (60*1000));
                    minutes < 10 ? minutes = "0" + minutes : minutes;
                    const minutesms = duracionms % (60*1000);
                    let duracionstr = hours + ":" + minutes;
                    console.log(duracionstr);
                    document.getElementById('duracionstr').value=duracionstr;
                },
            }
        }
    </script> --}}

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

</div>
{{-- 
<script>
    function indicadores() {
        return {
            start() {
                let $slaresolucion  = this.convertirSegundos(document.getElementById('localslar').value);
                let $duracionsinpr  = this.convertirSegundos(document.getElementById('duracionticket').value);
                let $duracionpr     = document.getElementById('duracionprseg').value;
                let $duracionconpr  = $duracionsinpr - $duracionpr + 0;
                // console.log($duracionpr);
                document.getElementById('duracionticketconpr').value = this.convertirHora($duracionconpr+0);

                if (($slaresolucion) >($duracionsinpr)) {
                    document.getElementById('resultadotodacausa').value = 'DENTRO';
                } else {
                    document.getElementById('resultadotodacausa').value = 'FUERA';
                }
                if (($slaresolucion) >($duracionconpr)) {
                    document.getElementById('resultadoconpr').value = 'DENTRO';
                } else {
                    document.getElementById('resultadoconpr').value = 'FUERA';
                }
                document.getElementById('duracionprseg').value = this.convertirHora(document.getElementById('duracionprseg').value);
            },

            convertirSegundos($valor) {
                let $mitad = $valor.indexOf(':');
                let $hora = $valor.substr(0, parseInt($mitad,10));
                let $minuto = $valor.substr(parseInt($mitad,10)+1, 2);
                return (parseInt($hora, 10) * 60 * 60) + (parseInt($minuto, 10) * 60);
            },

            convertirHora($valor) {
                let $horas = Math.trunc($valor/ 3600)+0;
                let $minutos = Math.trunc(($valor/ 3600 - Math.trunc($valor/ 3600))*60)+0;
                $horas < 10     ? $horas = "0" + $horas : $horas;
                $minutos < 10   ? $minutos = "0" + $minutos : $minutos;
                return $horas + ":" + $minutos;

            },
        }
    }
</script> --}}
