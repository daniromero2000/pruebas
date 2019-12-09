<?php

namespace App\Entities\Generals\Stratums\Repositories;

use App\Entities\Generals\Stratums\Stratum;
use App\Entities\Generals\Stratums\Repositories\Interfaces\StratumRepositoryInterface;
use Illuminate\Database\QueryException;

class StratumRepository implements StratumRepositoryInterface
{

    public function __construct(
        Stratum $Stratum
    ) {
        $this->model = $Stratum;
    }

    public function getAllStratumsNames()
    {
        try {
            return $this->model->orderBy('stratum', 'asc')->get(['id', 'stratum', 'description']);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }
}
