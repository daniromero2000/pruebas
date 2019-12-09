<?php

namespace App\Entities\Generals\VehicleBrands\Repositories;

use App\Entities\Generals\VehicleBrands\VehicleBrand;
use App\Entities\Generals\VehicleBrands\Repositories\Interfaces\VehicleBrandRepositoryInterface;
use Illuminate\Database\QueryException;

class VehicleBrandRepository implements VehicleBrandRepositoryInterface
{

    public function __construct(
        VehicleBrand $vehicleBrand
    ) {
        $this->model = $vehicleBrand;
    }

    public function getAllVehicleBrandsNames()
    {
        try {
            return $this->model->orderBy('vehicle_brand', 'asc')->get(['id', 'vehicle_brand']);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }
}
