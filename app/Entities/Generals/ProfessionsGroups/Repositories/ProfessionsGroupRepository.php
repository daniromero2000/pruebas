<?php

namespace App\Entities\Generals\ProfessionsGroups\Repositories;

use App\Entities\Generals\ProfessionsGroups\ProfessionsGroup;
use App\Entities\Generals\ProfessionsGroups\Repositories\Interfaces\ProfessionsGroupRepositoryInterface;

class ProfessionsGroupRepository implements ProfessionsGroupRepositoryInterface
{
    public function __construct(
        ProfessionsGroup $ProfessionsGroup
    ) {
        $this->model = $ProfessionsGroup;
    }
}
