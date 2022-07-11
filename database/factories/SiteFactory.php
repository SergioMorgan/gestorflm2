<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Site>
 */
class SiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // return [
        //     'localid'           =>$this->faker->unique()->numberBetween($min = 1000, $max = 9999),
        //     'zonal'             =>$this->faker->randomElement(['AREQUIPA', 'CUSCO', 'LIMA', 'TACNA']),
        //     'nombre'            =>$this->faker->name(),
        //     'estado'            =>$this->faker->optional($weight = 0.05, $default = "ACTIVO")->randomElement(['ACTIVO', 'INACTIVO']),
        //     'clasificacion'     =>$this->faker->randomElement(['TIPO 8_K', 'TIPO 8_L', '12_CLIENTES', 'TIPO 8_C', 'TIPO 8_1']),
        //     'prioridad'         =>$this->faker->randomElement(['BLACK', 'ORO', 'PLATA', 'CLASICO']),
        //     'facturacion'       =>$this->faker->randomElement(['FEE MENSUAL', 'RUTA', 'BAJO DEMANDA']),
        //     'tipolocal'         =>$this->faker->randomElement(['URA', 'URA/EBC', 'CT', 'EBC']),
        //     'tipozona'          =>$this->faker->randomElement(['URBANO', 'INTERURBANO', 'RURAL']),
        //     'latitud'           =>$this->faker->optional($weight = 0.9)->latitude($min = -18.2, $max = -17.3), 
        //     'longitud'          =>$this->faker->optional($weight = 0.9)->longitude($min = -70.2, $max = -69.3),
        //     'suministro'        =>$this->faker->optional($weight = 0.2)->phoneNumber(),
        //     'distribuidor'      =>$this->faker->optional($weight = 0.2)->company(),
        //     'torrera'           =>$this->faker->optional($weight = 0.9)->company(),
        //     'departamento'      =>$this->faker->state(),
        //     'provincia'         =>$this->faker->optional($weight = 0.9)->randomElement(['AREQUIPA', 'CUSCO', 'LIMA', 'TACNA']),
        //     'distrito'          =>$this->faker->city(),
        //     'direccion'         =>$this->faker->address(),
        //     'urlimagen'         =>$this->faker->optional($weight = 0.2)->imageUrl($width = 640, $height = 480),
        //     'observaciones'     =>$this->faker->optional($weight = 0.1)->sentence($nbWords = 26, $variableNbWords = true),
        //     'slapresencia'      =>$this->faker->randomElement(['05:00', '08:00', '10:00', '35:00']),
        //     'slaresolucion'     =>$this->faker->randomElement(['07:30', '09:30', '15:30', '35:00']),
        // ];
    }
}
