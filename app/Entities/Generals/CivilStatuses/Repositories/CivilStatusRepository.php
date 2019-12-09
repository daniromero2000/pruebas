<?php

namespace App\Entities\Generals\CivilStatuses\Repositories;

use App\Entities\Generals\CivilStatuses\CivilStatus;
use App\Entities\Generals\CivilStatuses\Repositories\Interfaces\CivilStatusRepositoryInterface;
use Illuminate\Database\QueryException;

class CivilStatusRepository implements CivilStatusRepositoryInterface
{
    public function __construct(
        CivilStatus $CivilStatus
    ) {
        $this->model = $CivilStatus;
    }

    public function getAllCivilStatusesNames()
    {
        try {
            return $this->model->orderBy('civil_status', 'asc')
                ->get(['id', 'civil_status']);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }
}
