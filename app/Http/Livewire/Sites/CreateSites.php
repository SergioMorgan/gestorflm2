<?php

namespace App\Http\Livewire\Sites;

use Livewire\Component;
use App\Models\Site;

class CreateSites extends Component {

    public $item;   //para identificar el elemento a editar
    public $site;   //para almacenar la instancia (registro) de la BBDD

    public $colorEtiquetas = 'bg-green-300';  //estilos del formulario (color fondo etiquetas)

    // Inicializar los campos de la tabla
    public $localid, $estado, $zonal, $nombre, $slapresencia, $slaresolucion, $clasificacion, $prioridad, $facturacion, $tipolocal, $tipozona, $departamento, $provincia, $distrito, $direccion, $latitud, $longitud, $urlimagen, $suministro, $distribuidor, $torrera, $observaciones;

    // Inicializar los valores de los controles SELECT del formulario
    public $selectEstado = ['ACTIVO', 'INACTIVO'];
    public $selectZonal = ['LIMA', 'AREQUIPA', 'CUSCO', 'PUNO', 'TACNA'];
    public $selectClasificacion = ['TIPO 8_N', 'TIPO 8_C', 'TIPO 10_C', 'TIPO 8_1', 'TIPO 8_2', 'TIPO 8_3', 'TIPO 8_4', 'TIPO 8_5', 'TIPO 8_E', 'TIPO 8_F', 'TIPO 8_G', 'TIPO 8_K', 'TIPO 8_L', 'TIPO 9_C', 'TIPO 12_CLIENTES', 'TIPO 13_INTERNOS', 'SCELL'];
    public $selectPrioridad = ['BLACK', 'ORO', 'PLATA', 'CLASICO'];
    public $selectFacturacion = ['FEE MENSUAL', 'RUTA', 'BAJO DEMANDA'];
    public $selectTipozona = ['URBANO', 'INTERURBANO', 'RURAL'];
    public $selectSlapresencia = ['03:00', '04:30', '06:30', '08:00', '08:30', '13:30', '18:30', '20:00', '35:00'];
    public $selectSlaresolucion = ['06:00', '07:00', '09:00', '11:00', '11:30', '19:00', '20:00', '21:30', '32:00', '35:00'];

    //Reglas de validacion
    //FALTA EXTENDER
    protected $rules = [
        'localid'   => 'required|unique:sites,localid',
        'estado'    => 'required|',
        'zonal'     => 'required|',
        'nombre'    => 'required',
        'latitud'   => 'nullable|numeric|between:-180,180',
        'longitud'  => 'nullable|numeric|between:-180,180',
        'urlimagen' => 'nullable|url',
    ];

    // Equivale a constructo, recibe la variable item (elemento a modificar en caso sea EDIT)
    public function mount($item = null) {
        $this->init($item);
    }
    // La primera funcion al ejecutarse, recibe como parametro el valor de item
    public function init($item) {
        $site = null;       //inicializar la instancia de site

        // si hay un valor en item, busca el registro correspondiente y lo guarda en $site
        if ($item)
            $site =  Site::findOrFail($item);

        // Asigna el registro encontrado a site. Este será NULL si no ha encontrado registro o no se ha pasado parametros
        $this->site = $site;

        // Si estamos en modo edicion (se ha enviado un parametro item)
        if ($this->site) {          // asigna los valores de los campos a las variables locales creadas
            $this->localid         = $this->site->localid;
            $this->estado          = $this->site->estado;
            $this->zonal           = $this->site->zonal;
            $this->nombre          = $this->site->nombre;
            $this->slapresencia    = $this->site->slapresencia;
            $this->slaresolucion   = $this->site->slaresolucion;
            $this->clasificacion   = $this->site->clasificacion;
            $this->prioridad       = $this->site->prioridad;
            $this->facturacion     = $this->site->facturacion;
            $this->tipolocal       = $this->site->tipolocal;
            $this->tipozona        = $this->site->tipozona;
            $this->departamento    = $this->site->departamento;
            $this->provincia       = $this->site->provincia;
            $this->distrito        = $this->site->distrito;
            $this->direccion       = $this->site->direccion;
            $this->latitud         = $this->site->latitud;
            $this->longitud        = $this->site->longitud;
            $this->urlimagen       = $this->site->urlimagen;
            $this->suministro      = $this->site->suministro;
            $this->distribuidor    = $this->site->distribuidor;
            $this->torrera         = $this->site->torrera;
            $this->observaciones   = $this->site->observaciones;
        }
    }

    // funcion principal para agregar o modificar datos en la BBDD
    public function submit() {
        // Si se trata de una edicion, modificar la regla para que no de error al validar localid como campo unico
        // aplicar para todos los campos con regla UNIQUE
        if ($this->site)
            $this->rules['localid'] = 'required|unique:sites,localid,' . $this->site->id;

        $this->validate();      // aplica las validaciones del array $RULES

        // Si estamos en modo edicion (se ha enviado un parametro item en la funcion init() )
        if ($this->site) {
            $this->site->update([   //actualiza los valores de la BBDD segun lo valores del formulario
                'localid'           => $this->localid,
                'estado'            => $this->estado,
                'zonal'             => $this->zonal,
                'nombre'            => $this->nombre,
                'slapresencia'      => $this->slapresencia,
                'slaresolucion'     => $this->slaresolucion,
                'clasificacion'     => $this->clasificacion,
                'prioridad'         => $this->prioridad,
                'facturacion'       => $this->facturacion,
                'tipolocal'         => $this->tipolocal,
                'tipozona'          => $this->tipozona,
                'departamento'      => $this->departamento,
                'provincia'         => $this->provincia,
                'distrito'          => $this->distrito,
                'direccion'         => $this->direccion,
                'latitud'           => $this->latitud,
                'longitud'          => $this->longitud,
                'urlimagen'         => $this->urlimagen,
                'suministro'        => $this->suministro,
                'distribuidor'      => $this->distribuidor,
                'torrera'           => $this->torrera,
                'observaciones'     => $this->observaciones,
            ]);
            $this->emit('alertOk', 'Actualizado');

        //Si estamos en modo crecion (no se ha enviado parametro item en la funcion init() ))
        } else {
            Site::create([          //actualiza los valores de la BBDD segun lo valores del formulario
                'localid'           => $this->localid,
                'estado'            => $this->estado,
                'zonal'             => $this->zonal,
                'nombre'            => $this->nombre,
                'slapresencia'      => $this->slapresencia,
                'slaresolucion'     => $this->slaresolucion,
                'clasificacion'     => $this->clasificacion,
                'prioridad'         => $this->prioridad,
                'facturacion'       => $this->facturacion,
                'tipolocal'         => $this->tipolocal,
                'tipozona'          => $this->tipozona,
                'departamento'      => $this->departamento,
                'provincia'         => $this->provincia,
                'distrito'          => $this->distrito,
                'direccion'         => $this->direccion,
                'latitud'           => $this->latitud,
                'longitud'          => $this->longitud,
                'urlimagen'         => $this->urlimagen,
                'suministro'        => $this->suministro,
                'distribuidor'      => $this->distribuidor,
                'torrera'           => $this->torrera,
                'observaciones'     => $this->observaciones,
            ]);
            $this->emit('alertOk', 'Registro creado');
        }
    }

    public function render()
    {
        // $roles = Role::all();
        return view('livewire.sites.create-sites');
    }
}
