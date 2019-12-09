<?php

namespace App\Entities\Generals\Cities\Repositories;

use App\Entities\Generals\Cities\City;
use App\Entities\Generals\Cities\Repositories\Interfaces\CityRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class CityRepository implements CityRepositoryInterface
{

    private $columns = ['id', 'city', 'province_id'];

    public function __construct(City $city)
    {
        $this->model = $city;
    }

    public function getAllCityNames()
    {
        try {
            return $this->model->orderBy('city', 'asc')->get(['id', 'city']);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function listCities()
    {
        try {
            return $this->model->orderBy('city', 'asc')->get($this->columns);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }


    public function findCityById(int $id): City
    {
        try {
            return $this->model->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function findCityByName(string $name): City
    {
        try {
            return $this->model->where(compact('name'))->firstOrFail();
        } catch (ModelNotFoundException $e) {
            abort(503, $e->getMessage());
        }
    }
}
