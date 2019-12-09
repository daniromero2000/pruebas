<?php

namespace Modules\Customers\Http\Controllers\Front;

use Modules\Customers\Entities\Customers\Repositories\CustomerRepository;
use Modules\Customers\Entities\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Http\Controllers\Controller;

class AccountsController extends Controller
{
    use OrderTransformable;

    private $customerRepo;
    private $orderRepo;


    public function __construct(
        CustomerRepositoryInterface $customerRepository

    ) {
        $this->customerRepo = $customerRepository;
    }

    public function index()
    {
        $customer = $this->customerRepo->findCustomerById(auth()->user()->id);

        $customerRepo = new CustomerRepository($customer);
        $orders = $customerRepo->findOrders(['*'], 'created_at');
        $addresses = $customerRepo->findAddresses();


        $orders->transform(function (Order $orders) {
            return $this->transformOrder($orders);
        });

        return view('front.accounts', [
            'customer' => $customer,
            'orders' => $this->customerRepo->paginateArrayResults($orders->toArray(), 15),
            'addresses' => $addresses,
            'items' => $customer->items,
        ]);
    }
}
