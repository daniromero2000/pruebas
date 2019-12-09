<?php

namespace App\Entities\Generals\Scholarities\Repositories;

use App\Entities\Generals\Scholarities\Scholarity;
use App\Entities\Generals\Scholarities\Repositories\Interfaces\ScholarityRepositoryInterface;
use Illuminate\Database\QueryException;

class ScholarityRepository implements ScholarityRepositoryInterface
{

    public function __construct(
        Scholarity $Scholarity
    ) {
        $this->model = $Scholarity;
    }

    public function getAllScholaritiesNames()
    {
        try {
            return $this->model->orderBy('scholarity', 'asc')->get(['id', 'scholarity']);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }
}
