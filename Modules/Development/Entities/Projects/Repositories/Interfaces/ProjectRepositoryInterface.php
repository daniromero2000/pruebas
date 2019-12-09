<?php

namespace Modules\Development\Entities\Projects\Repositories\Interfaces;

use Modules\Development\Entities\Projects\Project;

interface ProjectRepositoryInterface
{
  public function createProject(array $params);

  public function getLatesProjects();

  public function findProjectById($project): Project;

  public function getAllProjectNames();
}
