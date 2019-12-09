<?php

namespace App\Entities\Generals\Housings\Repositories;

use App\Entities\Generals\Housings\Housing;
use App\Entities\Generals\Housings\Repositories\Interfaces\HousingRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Entities\Generals\Housings\Exceptions\HousingNotFoundException;

class HousingRepository implements HousingRepositoryInterface
{

    public function __construct(
        Housing $housing
    ) {
        $this->model = $housing;
    }

    public function listHousings()
    {
        try {
            return $this->model->get(['id', 'housing']);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function getAllHousingsNames()
    {
        try {
            return $this->model->orderBy('housing', 'asc')->get(['id', 'housing']);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }
}
