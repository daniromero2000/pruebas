<?php

namespace App\Entities\Generals\IdentityTypes\Repositories;

use App\Entities\Generals\IdentityTypes\IdentityType;
use App\Entities\Generals\IdentityTypes\Repositories\Interfaces\IdentityTypeRepositoryInterface;
use Illuminate\Database\QueryException;

class IdentityTypeRepository implements IdentityTypeRepositoryInterface
{

    public function __construct(
        IdentityType $IdentityType
    ) {
        $this->model = $IdentityType;
    }

    public function getAllIdentityTypesNames()
    {
        try {
            return $this->model->orderBy('identity_type', 'asc')
                ->get(['id', 'identity_type']);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }
}
