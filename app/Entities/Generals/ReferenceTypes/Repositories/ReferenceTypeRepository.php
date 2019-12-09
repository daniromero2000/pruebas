<?php

namespace App\Entities\Generals\ReferenceTypes\Repositories;

use App\Entities\Generals\ReferenceTypes\ReferenceType;
use App\Entities\Generals\ReferenceTypes\Repositories\Interfaces\ReferenceTypeRepositoryInterface;

class ReferenceTypeRepository implements ReferenceTypeRepositoryInterface
{
    public function __construct(
        ReferenceType $ReferenceType
    ) {
        $this->model = $ReferenceType;
    }
}
