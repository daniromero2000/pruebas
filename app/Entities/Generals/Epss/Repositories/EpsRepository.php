<?php

namespace App\Entities\Generals\Epss\Repositories;

use App\Entities\Generals\Epss\Eps;
use App\Entities\Generals\Epss\Repositories\Interfaces\EpsRepositoryInterface;
use Illuminate\Database\QueryException;

class EpsRepository implements EpsRepositoryInterface
{

    public function __construct(
        Eps $Eps
    ) {
        $this->model = $Eps;
    }

    public function getAllEpsNames()
    {
        try {
            return $this->model->orderBy('eps', 'asc')->get(['id', 'eps']);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }
}
