<?php

namespace App\Http\Controllers\Admin\Cities;

use App\Entities\Generals\Cities\Repositories\Interfaces\CityRepositoryInterface;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    private $cityInterface;

    public function __construct(CityRepositoryInterface $cityRepositoryInterface)
    {
        $this->cityInterface = $cityRepositoryInterface;
        $this->middleware(['permission:countries, guard:employee']);
    }
}
