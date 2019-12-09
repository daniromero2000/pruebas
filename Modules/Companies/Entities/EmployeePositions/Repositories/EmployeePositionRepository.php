<?php

namespace Modules\Companies\Entities\EmployeePositions\Repositories;

use Modules\Companies\Entities\EmployeePositions\EmployeePosition;
use Modules\Companies\Entities\EmployeePositions\Repositories\Interfaces\EmployeePositionRepositoryInterface;
use Illuminate\Database\QueryException;

class EmployeePositionRepository implements EmployeePositionRepositoryInterface
{

  public function __construct(
    EmployeePosition $employeePosition
  ) {
    $this->model = $employeePosition;
  }

  public function getAllEmployeePositionNames()
  {
    try {
      return $this->model->get(['id', 'position']);
    } catch (QueryException $e) {
      abort(503, $e->getMessage());
    }
  }
}
