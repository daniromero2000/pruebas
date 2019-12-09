<?php

namespace Modules\Development\Entities\Issues\Issues\Repositories;

use Modules\Development\Entities\Issues\Issue;
use Modules\Development\Entities\Issues\Issues\Repositories\Interfaces\IssueRepositoryInterface;
use Illuminate\Database\QueryException;

class IssueRepository implements IssueRepositoryInterface
{
  public function __construct(Issue $issue)
  {
    $this->model = $issue;
  }

  public function createIssue(array $data): Issue
  {
    try {
      return $this->model->create($data);
    } catch (QueryException $e) {
      abort(503, $e->getMessage());
    }
  }

  public function findIssue($issue)
  {
    try {
      return $this->model->with('activeSprints')->findOrFail($issue);
    } catch (QueryException $e) {
      abort(503, $e->getMessage());
    }
  }

  public function listIssues()
  {
    try {
      return $this->model->with('issueStatus')
        ->orderBy('created_at', 'desc')->get();
    } catch (QueryException $e) {
      abort(503, $e->getMessage());
    }
  }
}
