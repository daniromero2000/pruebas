<?php

namespace Modules\Customers\Entities\Customers\Repositories\Interfaces;

use Modules\Customers\Entities\Customers\Customer;
use Illuminate\Database\Eloquent\Collection;


interface CustomerRepositoryInterface
{
    public function listCustomers($totalView);

    public function createCustomer(array $params): Customer;

    public function updateCustomer(array $params): bool;

    public function findCustomerById(int $id): Customer;

    public function findTrashedCustomerById(int $id): Customer;

    public function deleteCustomer(): bool;

    public function searchCustomer(string $text): Collection;

    public function searchTrashedCustomer(string $text): Collection;

    public function recoverTrashedCustomer(): bool;

    public function sendEmailToCustomer($customer);

    public function sendEmailNotificationToAdmin($customer);
}
