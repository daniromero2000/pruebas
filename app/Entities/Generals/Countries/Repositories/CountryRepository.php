<?php

namespace App\Entities\Generals\Countries\Repositories;

use App\Entities\Generals\Countries\Repositories\Interfaces\CountryRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Entities\Generals\Countries\Country;
use Illuminate\Support\Collection;

class CountryRepository implements CountryRepositoryInterface
{
    private $columns = ['id', 'name', 'iso', 'iso3', 'numcode', 'phonecode', 'status'];

    public function __construct(Country $country)
    {
        $this->model = $country;
    }

    public function listCountries(): Collection
    {
        try {
            return $this->model->where('status', 1)->get($this->columns);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function findCountryById(int $id): Country
    {
        try {
            return $this->model->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function findProvinces()
    {
        try {
            return $this->model->provinces;
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }
}
