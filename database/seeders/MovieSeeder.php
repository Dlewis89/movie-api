<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::insert([
            [
                'name' => 'Resident Evil',
                'release_year' => 2002,
                'rating' => 'R',
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'name' => 'Resident Evil Apocalypse',
                'release_year' => 2004,
                'rating' => 'R',
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'name' => 'Resident Evil Extinction',
                'release_year' => 2007,
                'rating' => 'R',
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'name' => 'Resident Evil Afterlife',
                'release_year' => 2010,
                'rating' => 'R',
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'name' => 'Resident Evil Retribution',
                'release_year' => 2012,
                'rating' => 'R',
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'name' => 'Resident Evil The Final Chapter',
                'release_year' => 2016,
                'rating' => 'R',
                'updated_at' => now(),
                'created_at' => now(),
            ],
        ]);
    }
}
