<?php

namespace App\Http\Controllers\Admin\Provinces;

use App\Entities\Generals\Provinces\Repositories\Interfaces\ProvinceRepositoryInterface;
use App\Http\Controllers\Controller;

class ProvinceController extends Controller
{
    protected $provinceInterface;

    public function __construct(ProvinceRepositoryInterface $provinceRepositoryInterface)
    {
        $this->provinceInterface = $provinceRepositoryInterface;
        $this->middleware(['permission:countries, guard:employee']);
    }

    public function show(int $countryId, int $provinceId)
    {
        return view('admin.provinces.show', [
            'province'  => $this->provinceInterface->findProvinceById($provinceId),
            'countryId' => $countryId,
            'cities'    => $this->provinceInterface->listCities($provinceId)->toArray()
        ]);
    }
}
