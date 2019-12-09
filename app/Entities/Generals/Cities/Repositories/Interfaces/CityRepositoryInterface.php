<?php

namespace App\Entities\Generals\Cities\Repositories\Interfaces;

use App\Entities\Generals\Cities\City;

interface CityRepositoryInterface
{
    public function getAllCityNames();

    public function listCities();

    public function findCityById(int $id): City;

    public function findCityByName(string $name): City;
}
