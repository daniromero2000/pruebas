<?php

namespace App\Entities\Generals\Countries\Repositories\Interfaces;

use App\Entities\Generals\Countries\Country;
use Illuminate\Support\Collection;

interface CountryRepositoryInterface
{
  public function listCountries(): Collection;

  public function findCountryById(int $id): Country;

  public function findProvinces();
}
