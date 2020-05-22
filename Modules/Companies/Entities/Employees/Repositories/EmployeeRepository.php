<?php

namespace Modules\Companies\Entities\Employees\Repositories;

use Modules\Companies\Entities\Employees\Employee;
use Modules\Companies\Entities\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    private $columns = ['id', 'name', 'last_name', 'status'];

    public function __construct(Employee $employee)
    {
        $this->model = $employee;
    }

    public function listEmployees(int $totalView)
    {
        try {
            return  $this->model
                ->orderBy('name', 'desc')
                ->skip($totalView)->take(30)
                ->get($this->columns);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function searchEmployee(string $text = null): Collection
    {
        if (is_null($text)) {
            return $this->model->get($this->columns);
        }
        return $this->model->searchEmployee($text)->get();
    }

    public function searchTrashedEmployee(string $text = null): Collection
    {
        if (is_null($text)) {
            return $this->model->onlyTrashed($text)->get($this->columns);
        }
        return $this->model->onlyTrashed()->get($this->columns);
    }

    public function createEmployee(array $data): Employee
    {
        try {
            $data['password'] = Hash::make($data['password']);
            return $this->model->create($data);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function findEmployeeById(int $id): Employee
    {
        try {
            return $this->model->with([
                'employeeCommentaries',
                'department',
                'employeeStatusesLogs',
                'employeePosition',
                'employeeEmails',
                'employeePhones',
                'employeeAddresses',
                'employeeIdentities',
                'employeeEpss',
                'employeeProfessions'
            ])->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function findTrashedEmployeeById(int $id): Employee
    {
        try {
            return $this->model->withTrashed()->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function updateEmployee(array $params): bool
    {
        try {
            if (isset($params['password'])) {
                $params['password'] = Hash::make($params['password']);
            }

            return $this->model->update($params);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function syncRoles(array $roleIds)
    {
        try {
            $this->model->roles()->sync($roleIds);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function hasRole(string $roleName): bool
    {
        return $this->model->hasRole($roleName);
    }

    public function isAuthUser(Employee $employee): bool
    {
        $isAuthUser = false;
        if (Auth::guard('employee')->user()->id == $employee->id) {
            $isAuthUser = true;
        }
        return $isAuthUser;
    }

    public function deleteEmployee(): bool
    {
        try {
            return $this->model->delete();
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function recoverTrashedEmployee(): bool
    {
        try {
            return $this->model->restore();
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }
}
