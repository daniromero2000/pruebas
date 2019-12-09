<?php

namespace Modules\Pqrs\Entities\Pqrs\Repositories;

use Modules\Pqrs\Entities\Pqrs\Pqr;
use Modules\Pqrs\Entities\Pqrs\Repositories\Interfaces\PqrRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Modules\Pqrs\Mail\SendPqrsToCustomerMailable;
use Modules\Pqrs\Mail\SendPqrsEmailNotificationToAdminMailable;
use Illuminate\Support\Facades\Mail;
use Modules\Companies\Entities\Employees\Employee;
use Modules\Companies\Entities\Employees\Repositories\EmployeeRepository;
use Illuminate\Support\Carbon;

class PqrRepository implements PqrRepositoryInterface
{

    public function __construct(Pqr $pqr)
    {
        $this->model = $pqr;
    }

    public function listPqrs($totalView)
    {
        try {
            return  $this->model->with('pqrStatus')
                ->orderBy('id', 'desc')
                ->skip($totalView)->take(30)->get();
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function createPqr(array $params): Pqr
    {
        try {
            $pqr  = new Pqr($params);
            $pqr->save();
            return $pqr;
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function updatePqr(array $params): bool
    {
        try {
            return $this->model->update($params);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function findPqrById(int $id)
    {
        try {
            return $this->model
                ->with('pqrsCommentaries')
                ->with('pqrsStatusesLog')
                ->with('city')
                ->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function findTrashedPqrById(int $id): Pqr
    {
        try {
            return $this->model->withTrashed()->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function deletePqr(): bool
    {
        try {
            return $this->model->delete();
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function searchPqr(string $text = null): Collection
    {
        if (is_null($text)) {
            return $this->model->all();
        }
        return $this->model->searchPqr($text)->get();
    }

    public function sendEmailToCustomer($pqrMail)
    {
        Mail::to($pqrMail->email)
            ->send(new SendPqrsToCustomerMailable($this->model->findPqrById($pqrMail->id)));
    }

    public function sendPqrsNotificationToAdmin($pqrMail)
    {
        $employeeRepo = new EmployeeRepository(new Employee);
        $employee     = $employeeRepo->findEmployeeById(4);

        Mail::to($employee)
            ->send(new SendPqrsEmailNotificationToAdminMailable($this->model->findPqrById($pqrMail->id)));
    }

    public function searchTrashedPqr(string $text = null): Collection
    {
        if (is_null($text)) {
            return $this->model->onlyTrashed($text)->get();
        }
        return $this->model->onlyTrashed()->get();
    }

    public function recoverTrashedPqr(): bool
    {
        try {
            return $this->model->restore();
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function pqrsDaysLeft($pqrcreated_at)
    {
        $now = Carbon::now();
        return $pqrcreated_at->diffInDays($now, false);
    }
}
