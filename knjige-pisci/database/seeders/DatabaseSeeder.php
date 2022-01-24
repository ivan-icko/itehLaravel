<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\City;
use App\Models\Genre;
use App\Models\User;
use App\Models\Writer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Writer::truncate();
        Book::truncate();
        Genre::truncate();

        Book::factory(5)->create();
        User::factory(5)->create();
        

        
        
    }
}
