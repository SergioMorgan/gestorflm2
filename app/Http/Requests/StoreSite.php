<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSite extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    // VALIDA SI EL USUARIO TIENE EL PERFIL NECESARIO PARA ACCIONAR
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'localid'   => 'required',
            'nombre'   => 'required',
            'zonal'     => 'required',
            'estado'    => 'required',
        ];
    }


    //PARA QUE EL CAMPO SE IDENTIFIQUE CON UN NOMBRE MAS AMIGABLE
    public function attributes()
    {
        return [
            'localid' => 'ID de local',
        ];
    }

    //PERSONALIZAR UN MENSAJE ESPECIFICO DE UN CAMPO PARA DETERMINADA VALIDACION
    public function messages()
    {
        return [
            'estado.required' => 'La descripcion no puede estar vacia',
        ];
    }
}
