<?php

namespace App\Entities\Generals\Genres\Repositories;

use App\Entities\Generals\Genres\Genre;
use App\Entities\Generals\Genres\Repositories\Interfaces\GenreRepositoryInterface;
use Illuminate\Database\QueryException;

class GenreRepository implements GenreRepositoryInterface
{

    public function __construct(
        Genre $Genre
    ) {
        $this->model = $Genre;
    }

    public function getAllGenresNames()
    {
        try {
            return $this->model->orderBy('genre', 'asc')->get(['id', 'genre']);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }
}
