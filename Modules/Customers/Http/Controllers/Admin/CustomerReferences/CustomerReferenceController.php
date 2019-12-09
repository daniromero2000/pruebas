<?php

namespace Modules\Customers\Http\Controllers\Admin\CustomerReferences;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Customers\Entities\CustomerIdentities\Repositories\Interfaces\CustomerIdentityRepositoryInterface;
use Modules\Customers\Entities\CustomerReferences\Requests\CreateCustomerReferenceRequest;
use Modules\Customers\Entities\CustomerReferences\Repositories\Interfaces\CustomerReferenceRepositoryInterface;
use Modules\Customers\Entities\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use Modules\Customers\Entities\CustomerStatusesLogs\Repositories\Interfaces\CustomerStatusesLogRepositoryInterface;
use Modules\Customers\Entities\CustomerPhones\Repositories\Interfaces\CustomerPhoneRepositoryInterface;

class CustomerReferenceController extends Controller
{

    private $customerReferenceInterface;
    private $customerInterface;
    private $customerIdentityInterface;
    private $customerPhoneInterface;
    private $customerStatusesLogInterface;


    public function __construct(
        CustomerReferenceRepositoryInterface $customerReferenceRepositoryInterface,
        CustomerRepositoryInterface $customerRepositoryInterface,
        CustomerIdentityRepositoryInterface $customerIdentityRepositoryInterface,
        CustomerStatusesLogRepositoryInterface $customerStatusesLogRepositoryInterface,
        CustomerPhoneRepositoryInterface $customerPhoneRepositoryInterface
    ) {
        $this->customerReferenceInterface   = $customerReferenceRepositoryInterface;
        $this->customerInterface            = $customerRepositoryInterface;
        $this->customerIdentityInterface    = $customerIdentityRepositoryInterface;
        $this->customerStatusesLogInterface = $customerStatusesLogRepositoryInterface;
        $this->customerPhoneInterface       = $customerPhoneRepositoryInterface;
        $this->middleware(['permission:customers, guard:employee']);
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('customers::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('customers::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CreateCustomerReferenceRequest $request)
    {
        $requestData = $request->except('_token', '_method');

        if (empty($customerPhone  = $this->customerPhoneInterface->checkIfExists($request['phone']))) {
            $requestData['customer_lead_id']   = 9;
            $requestData['customer_status_id'] = 3;
            $customer                          = $this->customerInterface->createCustomer($requestData);

            $customerStatusesLog = array(
                'customer_id' => $customer->id,
                'status'      => 'Creado',
                'employee_id' => auth()->guard('employee')->user()->id
            );

            $this->customerStatusesLogInterface->createCustomerStatusesLog($customerStatusesLog);

            $customerPhoneData                = $requestData;
            $customerPhoneData['customer_id'] = $customer->id;
            $customerPhoneData['phone_type']  = 'Móvil';
            $customerPhone                    = $this->customerPhoneInterface->createCustomerPhone($customerPhoneData);
        }

        $customerReference = array(
            'customer_id'       => $requestData['customer_id'],
            'relationship_id'   => $requestData['relationship_id'],
            'customer_phone_id' => $customerPhone->id
        );

        $reference = $this->customerReferenceInterface->createCustomerReference($customerReference);

        $data = array(
            'customer_id' => $reference->customer->id,
            'status'      => 'Referencia Agregada',
            'employee_id' => auth()->guard('employee')->user()->id
        );

        $this->customerStatusesLogInterface->createCustomerStatusesLog($data);

        $request->session()->flash('message', 'Adición de Referencia exitosa!');
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('customers::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('customers::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
