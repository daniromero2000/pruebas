<?php

namespace Modules\Customers\Entities\CustomerAddresses\Repositories;

use Modules\Customers\Entities\CustomerAddresses\CustomerAddress;
use Modules\Customers\Entities\CustomerAddresses\Repositories\Interfaces\CustomerAddressRepositoryInterface;
use Illuminate\Database\QueryException;

class CustomerAddressRepository implements CustomerAddressRepositoryInterface
{
    public function __construct(CustomerAddress $customerAddress)
    {
        $this->model = $customerAddress;
    }

    public function createCustomerAddress(array $data)
    {
        try {
            return $this->model->create($data);
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }
}
