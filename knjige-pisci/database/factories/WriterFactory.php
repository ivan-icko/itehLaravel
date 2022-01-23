<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WriterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'date_of_birth'=>$this->faker->date(),
            'birthplace'=>$this->faker->city()
        ];
    }
}
