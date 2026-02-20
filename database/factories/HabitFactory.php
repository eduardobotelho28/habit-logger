<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Habit>
 */
class HabitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $habits = [
            'ler 10 páginas'         ,
            'tomar 2 litros de água' ,
            'estudar programação'    ,
            'treinar musculação'     ,  
        ];

        return [
            'user_id' => 1,
            'name'    => $this->faker->unique()->randomElement($habits)
        ];
    }
}
