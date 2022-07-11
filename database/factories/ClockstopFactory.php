<?php

namespace Database\Factories;

use App\Models\Osticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clockstop>
 */
class ClockstopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
//         return [
//             'osticket_id'   => Osticket::all()->random()->id,
//             'inicio'        => $this->faker->dateTimeBetween('-6 days', 'now'),
//             'fin'           => $this->faker->dateTimeBetween('now', '+6 days'),
//             'motivo'        => $this->faker->optional($weight = 0.5, $default = "CORTE DE ENERGÍA COMERCIAL CON/SIN INSTALACIÓN DE GE")->randomElement([
//                                                                                     "CORTE DE ENERGÍA COMERCIAL CON/SIN INSTALACIÓN DE GE",
//                                                                                     "FENOMENOS NATURALES",
//                                                                                     "FUERA DE HORA PARA SUBIR A TORRE",
//                                                                                     "OBRA COMPLEMENTARIA",
//                                                                                     "REPUESTOS ENERGIA POR IMPORTACIÓN",
//                                                                                     "REPUESTOS ENERGIA POR OBSOLESCENCIA",
//                                                                                     "REPUESTOS RADIO",
//                                                                                     "REPUESTOS TRANSMISIONES",
//                                                                                     "SIN ACCESO POR HUELGA / BLOQUEO / ZONA PELIGROSA",
//                                                                                     "SIN ACCESO POR INDISPONIBILIDAD DE LLAVES",
//                                                                                     "SIN ACCESO POR INSTITUCIÓN PÚBLICA O PRIVADA",
//                                                                                     "SIN ACCESO POR PROCEDIMIENTOS DE SEGURIDAD TDP/TORRERA/OPERADOR (SITIO COUBICADO)",
//                                                                                     "SIN ACCESO POR PROPIETARIO NO UBICABLE Y/O DISPONIBLE",
//                                                                                     "SOPORTE TDP",
//                                                                                     "SOPORTE TERCEROS",
//                                                                                     "TRASLADO EXTREMO DE ENLACE",
//                                                                                     ]),
//             'sustento'      => $this->faker->sentence(),

// ];
    }
}
