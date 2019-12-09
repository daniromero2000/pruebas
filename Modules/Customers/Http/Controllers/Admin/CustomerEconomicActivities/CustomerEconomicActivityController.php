<?php

namespace Modules\Customers\Http\Controllers\Admin\CustomerEconomicActivities;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Customers\Entities\CustomerEconomicActivities\Requests\CreateCustomerEconomicActivityRequest;
use Modules\Customers\Entities\CustomerEconomicActivities\Repositories\Interfaces\CustomerEconomicActivityRepositoryInterface;
use Modules\Customers\Entities\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use Modules\Customers\Entities\CustomerStatusesLogs\Repositories\Interfaces\CustomerStatusesLogRepositoryInterface;

class CustomerEconomicActivityController extends Controller
{

    private $customerEconomicActivityInterface;
    private $customerInterface;
    private $customerStatusesLogInterface;


    public function __construct(
        CustomerEconomicActivityRepositoryInterface $customerEconomicActivityRepositoryInterface,
        CustomerRepositoryInterface $customerRepositoryInterface,
        CustomerStatusesLogRepositoryInterface $customerStatusesLogRepositoryInterface

    ) {
        $this->customerEconomicActivityInterface = $customerEconomicActivityRepositoryInterface;
        $this->customerInterface                 = $customerRepositoryInterface;
        $this->customerStatusesLogInterface      = $customerStatusesLogRepositoryInterface;
        $this->customerStatusesLogInterface      = $customerStatusesLogRepositoryInterface;
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
    public function store(CreateCustomerEconomicActivityRequest $request)
    {
        $customerEconomicActivity = $this->customerEconomicActivityInterface->createCustomerEconomicActivity($request->except('_token', '_method'));

        $data = array(
            'customer_id' => $customerEconomicActivity->customer->id,
            'status'      => 'Actividad Económica Agregada',
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
