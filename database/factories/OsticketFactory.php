<?php

namespace Database\Factories;

use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Osticket>
 */
class OsticketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // return [
        //     'site_id'           => Site::all()->random()->id,
        //     'user_id'           => User::all()->random()->id,
        //     'siom'              => $this->faker->unique()->numberBetween($min = 10000, $max = 99000),
        //     'estado'            => $this->faker->randomElement(['PENDIENTE', 'CERRADO', 'ANULADO', 'RECHAZADO']),
        //     'tipo'              => $this->faker->randomElement(['ENERGIA', 'RADIO', 'TRANSPORTE']),
        //     'fechaasignacion'   => $this->faker->dateTimeBetween('-6 days', 'now'),
        //     'fechallegada'      => $this->faker->dateTimeBetween('now', '+6 days'),
        //     'fechacierre'       => $this->faker->dateTimeBetween('+7 days', '+14 days'),
        //     'remedy'            => $this->faker->name(),
        //     'detalle'           => $this->faker->sentence($nbWords = 50, $variableNbWords = true),
        //     'cierre'            => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        //     'categoria'         => $this->faker->optional()->randomElement(["ABASTECIMIENTO COMBUSTIBLE",
        //                                                                     "CAMBIO DE EQUIPO / REPARACION / REPUESTO / CONSUMIBLE",
        //                                                                     "CESE AUTOMATICO",
        //                                                                     "CORTE DE ENERGIA Y CESE AUTOMATICO",
        //                                                                     "DESCARTE, NO CORRESPONDE",
        //                                                                     "FALSA ALARMA",
        //                                                                     "INSTALACION DE GE O BATERIAS",
        //                                                                     "REVISION / RESET / AJUSTES / LIMPIEZA"
        //                                                                     ]),
        //     'resultadoslap'     => $this->faker->optional($weight = 0.05, $default = "DENTRO")->randomElement(['DENTRO', 'FUERA', 'N.A.']),
        //     'resultadoslar'     => $this->faker->optional($weight = 0.05, $default = "DENTRO")->randomElement(['DENTRO', 'FUERA', 'N.A.']),
        // ];

    }
}
