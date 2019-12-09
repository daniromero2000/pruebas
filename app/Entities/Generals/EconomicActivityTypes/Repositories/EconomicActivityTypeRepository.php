<?php

namespace App\Entities\Generals\EconomicActivityTypes\Repositories;

use App\Entities\Generals\EconomicActivityTypes\EconomicActivityType;
use App\Entities\Generals\EconomicActivityTypes\Repositories\Interfaces\EconomicActivityTypeRepositoryInterface;
use Illuminate\Database\QueryException;


class EconomicActivityTypeRepository implements EconomicActivityTypeRepositoryInterface
{

    public function __construct(EconomicActivityType $EconomicActivityType)
    {
        $this->model = $EconomicActivityType;
    }

    public function getAllEconomicActivityTypesNames()
    {
        try {
            return $this->model->orderBy('economic_activity_type', 'asc')->get(['id', 'economic_activity_type']);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }
}
