<?php

namespace Modules\Customers\Entities\Customers\Repositories;

use Modules\Customers\Entities\Customers\Customer;
use Modules\Customers\Entities\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection as Support;
use Modules\Customers\Mail\SendWelcomeToCustomerMailable;
use Modules\Customers\Mail\SendWelcomeEmailNotificationToAdminMailable;
use Illuminate\Support\Facades\Mail;
use Modules\Companies\Entities\Employees\Employee;
use Modules\Companies\Entities\Employees\Repositories\EmployeeRepository;
use Carbon\Carbon;

class CustomerRepository implements CustomerRepositoryInterface
{
    private $columns = [
        'id',
        'name',
        'last_name',
        'birthday',
        'city_id',
        'scholarity_id',
        'customer_lead_id',
        'civil_status_id',
        'genre_id',
        'customer_status_id',
        'status',
        'created_at'
    ];

    public function __construct(Customer $customer)
    {
        $this->model = $customer;
    }

    public function listCustomers($totalView): Support
    {
        try {
            return  $this->model->with([
                'customerStatus',
                'customerLead'
            ])->orderBy('created_at', 'asc')
                ->skip($totalView)
                ->take(30)
                ->get($this->columns);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function createCustomer(array $params): Customer
    {
        try {
            $data = collect($params)->except('password')->all();

            $customer = new Customer($data);
            if (isset($params['password'])) {
                $customer->password = bcrypt($params['password']);
            }

            if ($customer->save())
                return $customer;
            else
                throw new Exception("Fallo la creacion del usuario" .  1);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function updateCustomer(array $params): bool
    {
        try {
            return $this->model->update($params);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function findCustomerById(int $id): Customer
    {
        try {
            $customer = $this->model->with([
                'genre',
                'customerPhones',
                'customerAddresses',
                'customerEmails',
                'customerStatus',
                'customerLead',
                'customerIdentities',
                'city',
                'civilStatus',
                'scholarity',
                'customerCommentaries',
                'customerStatusesLog',
                'customerVehicles',
                'customerProfessions',
                'customerReferences',
                'customerEpss',
                'customerEconomicActivities'
            ])->findOrFail($id);

            $customer->age =  $this->getCustomerAge($customer->birthday);

            return $customer;
        } catch (ModelNotFoundException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function findTrashedCustomerById(int $id): Customer
    {
        try {
            return $this->model->withTrashed()->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function deleteCustomer(): bool
    {
        try {
            return $this->model->delete();
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function searchCustomer(string $text = null): Collection
    {
        if (is_null($text)) {
            return  $this->model->with([
                'customerStatus',
                'customerLead'
            ])->orderBy('created_at', 'asc')
                ->take(30)
                ->get($this->columns);
        }
        return $this->model->searchCustomer($text)->with([
            'customerStatus',
            'customerLead'
        ])->get($this->columns);
    }

    public function searchTrashedCustomer(string $text = null): Collection
    {
        if (is_null($text)) {
            return $this->model->onlyTrashed($text)->get();
        }
        return $this->model->onlyTrashed()->get();
    }

    public function recoverTrashedCustomer(): bool
    {
        return $this->model->restore();
    }

    public function sendEmailToCustomer($customerMail)
    {
        Mail::to($customerMail->email)
            ->send(new SendWelcomeToCustomerMailable($this->model->findCustomerById($customerMail->id)));
    }

    public function sendEmailNotificationToAdmin($customerMail)
    {
        $employeeRepo = new EmployeeRepository(new Employee);
        $employee = $employeeRepo->findEmployeeById(4);
        Mail::to($employee)
            ->send(new sendWelcomeEmailNotificationToAdminMailable($this->model->findCustomerById($customerMail->id)));
    }

    private function getCustomerAge($birthday)
    {
        try {
            $now = Carbon::now();
            return $now->diffInYears($birthday);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }
}