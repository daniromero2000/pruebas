<?php

namespace App\Entities\Generals\Provinces\Repositories;

use App\Entities\Generals\Countries\Country;
use App\Entities\Generals\Provinces\Province;
use App\Entities\Generals\Provinces\Repositories\Interfaces\ProvinceRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;

class ProvinceRepository implements ProvinceRepositoryInterface
{
    public function __construct(Province $province)
    {
        $this->model = $province;
    }

    public function listProvinces(string $order = 'province', string $sort = 'desc', array $columns = ['*']): Collection
    {
        return $this->model->all($columns, $order, $sort);
    }

    public function findProvinceById(int $id): Province
    {
        try {
            return $this->model->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function updateProvince(array $params): bool
    {
        try {
            return $this->model->update($params);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function listCities(int $provinceId): Collection
    {
        return $this->findProvinceById($provinceId)->cities()->get();
    }

    public function findCountry(): Country
    {
        return $this->model->country;
    }
}
