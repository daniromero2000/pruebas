<?php

namespace App\Entities\Generals\VehicleTypes\Repositories;

use App\Entities\Generals\VehicleTypes\VehicleType;
use App\Entities\Generals\VehicleTypes\Repositories\Interfaces\VehicleTypeRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class VehicleTypeRepository implements VehicleTypeRepositoryInterface
{

    public function __construct(
        VehicleType $VehicleType
    ) {
        $this->model = $VehicleType;
    }

    public function getAllVehicleTypesNames()
    {
        try {
            return $this->model->orderBy('vehicle_type', 'asc')->get(['id', 'vehicle_type']);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function findVehicleTypeById($id): VehicleType
    {
        try {
            return $this->model->findOrfail($id);
        } catch (ModelNotFoundException $e) {
            abort(503, $e->getMessage());
        }
    }
}
