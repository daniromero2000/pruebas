<?php

namespace Modules\Development\Entities\Projects\Repositories;

use Modules\Development\Entities\Projects\Project;
use Modules\Development\Entities\Projects\Repositories\Interfaces\ProjectRepositoryInterface;
use Illuminate\Database\QueryException;

class ProjectRepository implements ProjectRepositoryInterface
{
  public function __construct(Project $project)
  {
    $this->model = $project;
  }

  public function getAllProjectNames()
  {
    try {
      return $this->model->orderBy('name', 'asc')->get(['id', 'name']);
    } catch (QueryException $e) {
      abort(503, $e->getMessage());
    }
  }

  public function createProject(array $data): Project
  {
    try {
      return $this->model->create($data);
    } catch (QueryException $e) {
      abort(503, $e->getMessage());
    }
  }

  public function getLatesProjects()
  {
    try {
      return $this->model->with('activeSprints')->latest()->get();
    } catch (QueryException $e) {
      abort(503, $e->getMessage());
    }
  }

  public function findProjectById($id): Project
  {
    try {
      return $this->model->with('activeSprints')->findOrFail($id);
    } catch (QueryException $e) {
      abort(503, $e->getMessage());
    }
  }
}
