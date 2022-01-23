<?php

namespace Database\Factories;

use App\Models\Genre;
use App\Models\Writer;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'genre_id'=>Genre::factory(),
            'writer_id'=>Writer::factory(),
            'title'=>$this->faker->jobTitle(),
            'abstract'=>$this->faker->paragraph(),
            'year_of_publication'=>$this->faker->year()
        ];
    }
}
