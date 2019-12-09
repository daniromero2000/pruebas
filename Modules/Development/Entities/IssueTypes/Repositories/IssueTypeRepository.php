<?php

namespace Modules\Development\Entities\IssueTypes\Repositories;

use Modules\Development\Entities\IssueTypes\IssueType;
use Modules\Development\Entities\IssueTypes\Repositories\Interfaces\IssueTypeRepositoryInterface;
use Illuminate\Database\QueryException;

class IssueTypeRepository implements IssueTypeRepositoryInterface
{
  public function __construct(IssueType $issueType)
  {
    $this->model = $issueType;
  }

  public function listIssueTypes()
  {
    try {
      return $this->model->orderBy('label', 'desc')->get(['id', 'label']);
    } catch (QueryException $e) {
      abort(503, $e->getMessage());
    }
  }
}
