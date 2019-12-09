<?php

use App\Entities\Generals\Genres\Genre;
use Illuminate\Database\Seeder;

class GenreTableSeeder extends Seeder
{
    public function run()
    {
        factory(Genre::class)->create([
            'genre'  => 'Hombre',
        ]);

        factory(Genre::class)->create([
            'genre'  => 'Mujer',
        ]);

        factory(Genre::class)->create([
            'genre'  => 'Otro',
        ]);
    }
}
