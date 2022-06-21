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
        return [
            'localid'   =>$this->faker->unique()->numberBetween($min = 100, $max = 999),
            // 'localid'   =>$this->faker->unique()->word(),
            'zonal'     =>$this->faker->randomElement(['AREQUIPA', 'CUSCO', 'LIMA', 'TACNA']),
            // 'zonal'    =>$this->faker->word(),
            // 'subzona',
            'nombre'    =>$this->faker->word(),
            // 'estado'    =>$this->faker->optional($weight = 0.15, $default = "ACTIVO")->randomElements(['ACTIVO', 'INACTIVO']),
            'estado'    =>$this->faker->randomElement(['ACTIVO', 'INACTIVO']),
            // 'estado'    =>$this->faker->word(),
            // 'clasificacion',
            // 'prioridad',
            // 'facturacion',
            // 'tipolocal',
            // 'tipozona',
            // 'latitud',
            // 'longitud',
            // 'suministro',
            // 'distribuidor',
            // 'torrera',
            // 'departamento',
            // 'provincia',
            // 'distrito',
            // 'direccion',
            // 'observaciones',
            // 'slapresencia',
            // 'slaresolucion'
        ];
    }
}
