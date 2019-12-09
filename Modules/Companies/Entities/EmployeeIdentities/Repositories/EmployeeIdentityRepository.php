<?php

namespace Modules\Companies\Entities\EmployeeIdentities\Repositories;

use Modules\Companies\Entities\EmployeeIdentities\EmployeeIdentity;
use Modules\Companies\Entities\EmployeeIdentities\Repositories\Interfaces\EmployeeIdentityRepositoryInterface;
use Illuminate\Database\QueryException;


class EmployeeIdentityRepository implements EmployeeIdentityRepositoryInterface
{
    public function __construct(
        EmployeeIdentity $employeeIdentity

    ) {
        $this->model = $employeeIdentity;
    }

    public function createEmployeeIdentity(array $data)
    {
        try {
            return $this->model->create($data);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function checkIfExists($request)
    {
        if ($employeeIdentity = $this->findEmployeeIdentity($request)) {
            return $employeeIdentity;
        } else {
            return;
        }
    }

    private function findEmployeeIdentity($data)
    {
        try {
            if (!empty($employeeIdentity = $this->model->where('identity_number', $data)->first())) {
                return  $employeeIdentity;
            } else {
                return;
            }
        } catch (ModelNotFoundException $e) {
            abort(503, $e->getMessage());
        }
    }
}
