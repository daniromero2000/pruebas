<?php

namespace App\Entities\Generals\Tools;

use App\Entities\Generals\Tools\ToolRepositoryInterface;

class ToolRepository implements ToolRepositoryInterface
{
  public function getSkip($RequestSkip)
  {
    if ($RequestSkip == null) {
      return 0;
    } else {
      return $RequestSkip;
    }
  }
}
