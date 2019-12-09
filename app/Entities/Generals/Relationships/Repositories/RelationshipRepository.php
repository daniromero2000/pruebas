<?php

namespace App\Entities\Generals\Relationships\Repositories;

use App\Entities\Generals\Relationships\Relationship;
use App\Entities\Generals\Relationships\Repositories\Interfaces\RelationshipRepositoryInterface;
use Illuminate\Database\QueryException;

class RelationshipRepository implements RelationshipRepositoryInterface
{

    public function __construct(
        Relationship $Relationship
    ) {
        $this->model = $Relationship;
    }

    public function getAllRelationshipsNames()
    {
        try {
            return $this->model->orderBy('relationship', 'asc')->get(['id', 'relationship']);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }
}
