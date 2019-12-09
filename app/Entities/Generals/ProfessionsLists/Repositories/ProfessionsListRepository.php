<?php

namespace App\Entities\Generals\ProfessionsLists\Repositories;

use App\Entities\Generals\ProfessionsLists\ProfessionsList;
use App\Entities\Generals\ProfessionsLists\Exceptions\CreateProfessionsListErrorException;
use App\Entities\Generals\ProfessionsLists\Repositories\Interfaces\ProfessionsListRepositoryInterface;
use Modules\Customers\Entities\Customers\Customer;
use Illuminate\Database\QueryException;


class ProfessionsListRepository implements ProfessionsListRepositoryInterface
{
    public function __construct(ProfessionsList $ProfessionsList)
    {
        $this->model = $ProfessionsList;
    }

    public function getAllProfessionsNames()
    {
        try {
            return $this->model->orderBy('profession', 'asc')->get(['id', 'profession']);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }
}
