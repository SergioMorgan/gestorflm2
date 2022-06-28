{{-- <x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-2 lg:px-4 py-4">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @can('sites.index')
                @livewire('sites.create-sites')
            @endcan
        </div>
    </div>
</x-app-layout> --}}

{{-- 

<x-app-layout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <form action="{{ route('sites.update', $site) }}" method="POST">
                            @csrf
                            @method('put')
                            <label>
                                ID de local
                                <input type="text" name="localid" value="{{ old('localid', $site->localid) }}">
                                @error('localid')
                                    <br>
                                    <small>{{ $message }}</small>
                                    <br>
                                @enderror
                            </label>
                            <br>
                            <label>
                                Zonal
                                <input type="text" name="zonal" value="{{ old('zonal', $site->zonal) }}">
                                @error('zonal')
                                    <br>
                                    <small>{{ $message }}</small>
                                    <br>
                                @enderror
                            </label>
                            <br>
                            <label>
                                Nombre
                                <input type="text" name="nombre" value="{{ old('nombre', $site->nombre) }}">
                                @error('nombre')
                                    <br>
                                    <small>{{ $message }}</small>
                                    <br>
                                @enderror
                            </label>
                            <br>
                            <label>
                                Estado
                                <input type="text" name="estado" value="{{ old('estado', $site->estado) }}">
                                @error('estado')
                                    <br>
                                    <small>{{ $message }}</small>
                                    <br>
                                @enderror
                            </label>
                            <br>
                            <label>
                                Clasificacion
                                <input type="text" name="clasificacion" value="{{ old('clasificacion', $site->clasificacion) }}">
                                @error('clasificacion')
                                    <br>
                                    <small>{{ $message }}</small>
                                    <br>
                                @enderror
                            </label>
                            <br>
                            <label>
                                Prioridad
                                <input type="text" name="prioridad" value="{{ old('prioridad', $site->prioridad) }}">
                                @error('prioridad')
                                    <br>
                                    <small>{{ $message }}</small>
                                    <br>
                                @enderror
                            </label>
                            <br>
                            <label>
                                Facturacion
                                <input type="text" name="facturacion" value="{{ old('facturacion', $site->facturacion) }}">
                                @error('facturacion')
                                    <br>
                                    <small>{{ $message }}</small>
                                    <br>
                                @enderror
                            </label>
                            <br>
                            <label>
                                Tipo de local
                                <input type="text" name="tipolocal" value="{{ old('tipolocal', $site->tipolocal) }}">
                                @error('tipolocal')
                                    <br>
                                    <small>{{ $message }}</small>
                                    <br>
                                @enderror
                            </label>
                            <br>
                            <label>
                                Tipo de zona
                                <input type="text" name="tipozona" value="{{ old('tipozona', $site->tipozona) }}">
                                @error('tipozona')
                                    <br>
                                    <small>{{ $message }}</small>
                                    <br>
                                @enderror
                            </label>
                            <br>
                            <label>
                                Latitud
                                <input type="text" name="latitud" value="{{ old('latitud', $site->latitud) }}">
                                @error('latitud')
                                    <br>
                                    <small>{{ $message }}</small>
                                    <br>
                                @enderror
                            </label>
                            <br>
                            <label>
                                Longitud
                                <input type="text" name="longitud" value="{{ old('longitud', $site->longitud) }}">
                                @error('longitud')
                                    <br>
                                    <small>{{ $message }}</small>
                                    <br>
                                @enderror
                            </label>
                            <br>
                            <label>
                                Suministro
                                <input type="text" name="suministro" value="{{ old('suministro', $site->suministro) }}">
                                @error('suministro')
                                    <br>
                                    <small>{{ $message }}</small>
                                    <br>
                                @enderror
                            </label>
                            <br>
                            <label>
                                Distribuidor
                                <input type="text" name="distribuidor" value="{{ old('distribuidor', $site->distribuidor) }}">
                                @error('distribuidor')
                                    <br>
                                    <small>{{ $message }}</small>
                                    <br>
                                @enderror
                            </label>
                            <br>
                            <label>
                                Torrera
                                <input type="text" name="torrera" value="{{ old('torrera', $site->torrera) }}">
                                @error('torrera')
                                    <br>
                                    <small>{{ $message }}</small>
                                    <br>
                                @enderror
                            </label>
                            <br>
                            <label>
                                Dpto
                                <input type="text" name="departamento" value="{{ old('departamento', $site->departamento) }}">
                                @error('departamento')
                                    <br>
                                    <small>{{ $message }}</small>
                                    <br>
                                @enderror
                            </label>
                            <br>
                            <label>
                                Provincia
                                <input type="text" name="provincia" value="{{ old('provincia', $site->provincia) }}">
                                @error('provincia')
                                    <br>
                                    <small>{{ $message }}</small>
                                    <br>
                                @enderror
                            </label>
                            <br>
                            <label>
                                Distrito
                                <input type="text" name="distrito" value="{{ old('distrito', $site->distrito) }}">
                                @error('distrito')
                                    <br>
                                    <small>{{ $message }}</small>
                                    <br>
                                @enderror
                            </label>
                            <br>
                            <label>
                                Direccion
                                <input type="text" name="direccion" value="{{ old('direccion', $site->direccion) }}">
                                @error('direccion')
                                    <br>
                                    <small>{{ $message }}</small>
                                    <br>
                                @enderror
                            </label>
                            <br>
                            <label>
                                Imagen
                                <input type="text" name="urlimagen" value="{{ old('urlimagen', $site->urlimagen) }}">
                                @error('urlimagen')
                                    <br>
                                    <small>{{ $message }}</small>
                                    <br>
                                @enderror
                            </label>
                            <br>
                            <label>
                                Observaciones
                                <input type="text" name="observaciones" value="{{ old('observaciones', $site->observaciones) }}">
                                @error('observaciones')
                                    <br>
                                    <small>{{ $message }}</small>
                                    <br>
                                @enderror
                            </label>
                            <br>
                            <label>
                                Sla presencia
                                <input type="text" name="slapresencia" value="{{ old('slapresencia', $site->slapresencia) }}">
                                @error('slapresencia')
                                    <br>
                                    <small>{{ $message }}</small>
                                    <br>
                                @enderror
                            </label>
                            <br>
                            <label>
                                Sla resolucion
                                <input type="text" name="slaresolucion" value="{{ old('slaresolucion', $site->slaresolucion) }}">
                                @error('slaresolucion')
                                    <br>
                                    <small>{{ $message }}</small>
                                    <br>
                                @enderror
                            </label>
                            <br>
                            @can('sites.create')
                                <button type="submit">Actualizar</button>
                            @endcan
                        </form>
                </div>
            </div>
        </div>

</x-app-layout>

 --}}
