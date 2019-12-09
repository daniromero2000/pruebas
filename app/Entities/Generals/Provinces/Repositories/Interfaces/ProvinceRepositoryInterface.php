<?php

namespace App\Entities\Generals\Provinces\Repositories\Interfaces;

use App\Entities\Generals\Countries\Country;
use App\Entities\Generals\Provinces\Province;
use Illuminate\Support\Collection;

interface ProvinceRepositoryInterface
{
    public function listProvinces(string $order = 'id', string $sort = 'desc', array $columns = ['*']): Collection;

    public function findProvinceById(int $id): Province;

    public function updateProvince(array $params): bool;

    public function listCities(int $provinceId);

    public function findCountry(): Country;
}
