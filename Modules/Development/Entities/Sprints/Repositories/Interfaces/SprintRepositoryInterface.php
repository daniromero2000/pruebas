<?php

namespace Modules\Development\Entities\Sprints\Repositories\Interfaces;

interface SprintRepositoryInterface
{
  public function createSprint(array $params);

  public function createBacklogSprint($id);
}
