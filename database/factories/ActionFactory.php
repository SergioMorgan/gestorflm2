<?php

namespace Database\Factories;

use App\Models\Osticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Action>
 */
class ActionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // return [
        //     'user_id'           => User::all()->random()->id,
        //     'osticket_id'       => Osticket::all()->random()->id,
        //     'detalle'            => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        // ];
    }
}
