<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('sites.store') }}" method="POST">

                    <div>
                        @csrf
                        <label>
                            ID de local
                            <input type="text" name="localid" value="{{ old('localid') }}">
                            @error('localid')
                                <br>
                                <small>{{ $message }}</small>
                                <br>
                            @enderror
                        </label>
                        <br>
                        <label>
                            Zonal
                            <input type="text" name="zonal" value="{{ old('zonal') }}">
                            @error('zonal')
                                <br>
                                <small>{{ $message }}</small>
                                <br>
                            @enderror
                        </label>
                        <br>
                        <label>
                            Nombre
                            <input type="text" name="nombre" value="{{ old('nombre') }}">
                            @error('nombre')
                                <br>
                                <small>{{ $message }}</small>
                                <br>
                            @enderror
                        </label>
                        <br>
                        <label>
                            Estado
                            <input type="text" name="estado" value="{{ old('estado') }}">
                            @error('estado')
                                <br>
                                <small>{{ $message }}</small>
                                <br>
                            @enderror
                        </label>
                        <br>
                        <label>
                            Clasificacion
                            <input type="text" name="clasificacion" value="{{ old('clasificacion') }}">
                            @error('clasificacion')
                                <br>
                                <small>{{ $message }}</small>
                                <br>
                            @enderror
                        </label>
                        <br>
                        <label>
                            Prioridad
                            <input type="text" name="prioridad" value="{{ old('prioridad') }}">
                            @error('prioridad')
                                <br>
                                <small>{{ $message }}</small>
                                <br>
                            @enderror
                        </label>
                        <br>
                        <label>
                            Facturacion
                            <input type="text" name="facturacion" value="{{ old('facturacion') }}">
                            @error('facturacion')
                                <br>
                                <small>{{ $message }}</small>
                                <br>
                            @enderror
                        </label>
                        <br>
                        <label>
                            Tipo de local
                            <input type="text" name="tipolocal" value="{{ old('tipolocal') }}">
                            @error('tipolocal')
                                <br>
                                <small>{{ $message }}</small>
                                <br>
                            @enderror
                        </label>
                        <br>
                        <label>
                            Tipo de zona
                            <input type="text" name="tipozona" value="{{ old('tipozona') }}">
                            @error('tipozona')
                                <br>
                                <small>{{ $message }}</small>
                                <br>
                            @enderror
                        </label>
                        <br>
                        <label>
                            Latitud
                            <input type="text" name="latitud" value="{{ old('latitud') }}">
                            @error('latitud')
                                <br>
                                <small>{{ $message }}</small>
                                <br>
                            @enderror
                        </label>
                        <br>
                        <label>
                            Longitud
                            <input type="text" name="longitud" value="{{ old('longitud') }}">
                            @error('longitud')
                                <br>
                                <small>{{ $message }}</small>
                                <br>
                            @enderror
                        </label>
                        <br>
                        <label>
                            Suministro
                            <input type="text" name="suministro" value="{{ old('suministro') }}">
                            @error('suministro')
                                <br>
                                <small>{{ $message }}</small>
                                <br>
                            @enderror
                        </label>
                        <br>
                        <label>
                            Distribuidor
                            <input type="text" name="distribuidor" value="{{ old('distribuidor') }}">
                            @error('distribuidor')
                                <br>
                                <small>{{ $message }}</small>
                                <br>
                            @enderror
                        </label>
                        <br>
                        <label>
                            Torrera
                            <input type="text" name="torrera" value="{{ old('torrera') }}">
                            @error('torrera')
                                <br>
                                <small>{{ $message }}</small>
                                <br>
                            @enderror
                        </label>
                        <br>
                        <label>
                            Dpto
                            <input type="text" name="departamento" value="{{ old('departamento') }}">
                            @error('departamento')
                                <br>
                                <small>{{ $message }}</small>
                                <br>
                            @enderror
                        </label>
                        <br>
                        <label>
                            Provincia
                            <input type="text" name="provincia" value="{{ old('provincia') }}">
                            @error('provincia')
                                <br>
                                <small>{{ $message }}</small>
                                <br>
                            @enderror
                        </label>
                        <br>
                        <label>
                            Distrito
                            <input type="text" name="distrito" value="{{ old('distrito') }}">
                            @error('distrito')
                                <br>
                                <small>{{ $message }}</small>
                                <br>
                            @enderror
                        </label>
                        <br>
                        <label>
                            Direccion
                            <input type="text" name="direccion" value="{{ old('direccion') }}">
                            @error('direccion')
                                <br>
                                <small>{{ $message }}</small>
                                <br>
                            @enderror
                        </label>
                        <br>
                        <label>
                            Imagen
                            <input type="text" name="urlimagen" value="{{ old('urlimagen') }}">
                            @error('urlimagen')
                                <br>
                                <small>{{ $message }}</small>
                                <br>
                            @enderror
                        </label>
                        <br>
                        <label>
                            Observaciones
                            <input type="text" name="observaciones" value="{{ old('observaciones') }}">
                            @error('observaciones')
                                <br>
                                <small>{{ $message }}</small>
                                <br>
                            @enderror
                        </label>
                        <br>
                        <label>
                            Sla presencia
                            <input type="text" name="slapresencia" value="{{ old('slapresencia') }}">
                            @error('slapresencia')
                                <br>
                                <small>{{ $message }}</small>
                                <br>
                            @enderror
                        </label>
                        <br>
                        <label>
                            Sla resolucion
                            <input type="text" name="slaresolucion" value="{{ old('slaresolucion') }}">
                            @error('slaresolucion')
                                <br>
                                <small>{{ $message }}</small>
                                <br>
                            @enderror
                        </label>
                        <br>
                    </div>

                    {{-- <a class="btn btn-red ml-2"
                    wire:click="$emit('updateAlert', {{ 'siteid' }})">
                    <i class="fa-solid fa-trash"></i> --}}

                    <button type="submit">Enviar</button>

                    </a>
                </form>
            </div>
        </div>
    </div>

    {{-- @push('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            livewire.on('updateAlert', siteid => {
                Swal.fire(
                    'The Internet?',
                    'That thing is still around?',
                    'question'
                )
            })
        </script>
    @endpush --}}

</x-app-layout>



