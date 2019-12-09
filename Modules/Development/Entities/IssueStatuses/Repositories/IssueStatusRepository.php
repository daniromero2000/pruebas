<?php

namespace Modules\Development\Entities\IssueStatuses\Repositories;

use Modules\Development\Entities\IssueStatuses\IssueStatus;
use Modules\Development\Entities\IssueStatuses\Repositories\Interfaces\IssueStatusRepositoryInterface;
use Illuminate\Database\QueryException;

class IssueStatusRepository implements IssueStatusRepositoryInterface
{
  public function __construct(IssueStatus $issueStatus)
  {
    $this->model = $issueStatus;
  }

  public function listIssueStatuses()
  {
    try {
      return $this->model->orderBy('label', 'desc')->get();
    } catch (QueryException $e) {
      abort(503, $e->getMessage());
    }
  }
}
