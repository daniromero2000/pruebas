<?php

namespace Modules\Development\Entities\Sprints\Repositories;

use Modules\Development\Entities\Sprints\Sprint;
use Modules\Development\Entities\Sprints\Repositories\Interfaces\SprintRepositoryInterface;
use Illuminate\Database\QueryException;

class SprintRepository implements SprintRepositoryInterface
{
  public function __construct(Sprint $sprint)
  {
    $this->model = $sprint;
  }

  public function createSprint(array $data): Sprint
  {
    try {
      return $this->model->create($data);
    } catch (QueryException $e) {
      abort(503, $e->getMessage());
    }
  }

  /**
   * createBacklogSprint when a new project is created,
   * create a sprint named backlog by default and set its status to inactive
   * @param  int $projectId
   */
  public function createBacklogSprint($projectId)
  {
    if ($projectId) {
      $sprint = new Sprint;
      $sprint->name = 'Backlog';
      $sprint->machine_name = 'backlog';
      $sprint->status_id = 2;
      $sprint->project_id = (int) $projectId;
      $sprint->sort_order = 0;
      $sprint->save();
    }
  }
}
