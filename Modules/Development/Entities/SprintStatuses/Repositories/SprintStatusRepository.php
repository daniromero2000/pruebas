<?php

namespace Modules\Development\Entities\SprintStatuses\Repositories;

use Modules\Development\Entities\SprintStatuses\SprintStatus;
use Modules\Development\Entities\SprintStatuses\Repositories\Interfaces\SprintStatusRepositoryInterface;
use Illuminate\Database\QueryException;

class SprintStatusRepository implements SprintStatusRepositoryInterface
{
  public function __construct(SprintStatus $sprintStatus)
  {
    $this->model = $sprintStatus;
  }

  public function createSprintStatus(array $data): SprintStatus
  {
    try {
      return $this->model->create($data);
    } catch (QueryException $e) {
      abort(503, $e->getMessage());
    }
  }
}
