<?php

namespace Modules\Development\Entities\Issues\Issues\Repositories\Interfaces;

interface IssueRepositoryInterface
{
  public function createIssue(array $params);

  public function findIssue($project);

  public function listIssues();
}
