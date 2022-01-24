<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\City;
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
            'city'=>City::factory()
        ];
    }
}
