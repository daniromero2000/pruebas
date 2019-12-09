<?php

namespace Modules\EmployeeAbsences\Entities\EmployeeAbsences\Repositories;

use Modules\EmployeeAbsences\Entities\EmployeeAbsences\Repositories\Interfaces\EmployeeAbsenceRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use Modules\EmployeeAbsences\Entities\EmployeeAbsences\EmployeeAbsence;
use Modules\EmployeeAbsences\Entities\Absences\EmployeeAbsence as ModulesEmployeeAbsencesEmployeeAbsence;


use Modules\EmployeeAbsences\Entities\EmployeeAbsences\EmployeeAbsence as ModulesEmployeeAbsence;

class EmployeeAbsenceRepository implements EmployeeAbsenceRepositoryInterface
{
    private $columns = ['id','start_date', 'finish_date'];

    public function __construct(EmployeeAbsence $employeeAbsence)
    {
        $this->model = $employeeAbsence;
    }

    public function getAllEmployeeAbsenceTimes(): Collection
    {
        try {
            return $this->model->orderBy('created_at', 'asc')->get();
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function createEmployeeAbsence(array $params): EmployeeAbsence
    {
        try {
            return $this->model->create($params);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function findEmployeeAbsenceById(int $id): EmployeeAbsence
    {
        try {
            return $this->model->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function findTrashedEmployeeAbsenceById(int $id): EmployeeAbsence
    {
        try {
            return $this->model->withTrashed()->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function updateEmployeeAbsence(array $data): bool
    {
        try {
            return $this->model->update($data);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function deleteEmployeeAbsence(): bool
    {
        try {
            return $this->model->delete();
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function listEmployeeAbsences(int $totalView): Collection
    {
        try {
            return  $this->model->orderBy('created_at', 'asc')
                ->skip($totalView)->take(30)->get($this->columns);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function searchEmployeeAbsence(string $text = null): Collection
    {
        try {
            if (is_null($text)) {
                return $this->model->get();
            }
            return $this->model->searchEmployeeAbsence($text)->get();
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function searchTrashedEmployeeAbsence(string $text = null): Collection
    {
        try {
            if (is_null($text)) {
                return $this->model->onlyTrashed($text)->get();
            }
            return $this->model->onlyTrashed()->get();
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function recoverTrashedEmployeeAbsence(): bool
    {
        try {
            return $this->model->restore();
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }
}
