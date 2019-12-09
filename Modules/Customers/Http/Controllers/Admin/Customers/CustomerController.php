<?php

namespace Modules\Customers\Http\Controllers\Admin\Customers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Generals\Tools\ToolRepositoryInterface;
use App\Entities\Generals\Cities\Repositories\Interfaces\CityRepositoryInterface;
use App\Entities\Generals\CivilStatuses\Repositories\Interfaces\CivilStatusRepositoryInterface;
use App\Entities\Generals\Genres\Repositories\Interfaces\GenreRepositoryInterface;
use App\Entities\Generals\IdentityTypes\Repositories\Interfaces\IdentityTypeRepositoryInterface;
use App\Entities\Generals\ProfessionsLists\Repositories\Interfaces\ProfessionsListRepositoryInterface;
use App\Entities\Generals\Relationships\Repositories\Interfaces\RelationshipRepositoryInterface;
use App\Entities\Generals\Scholarities\Repositories\Interfaces\ScholarityRepositoryInterface;
use App\Entities\Generals\Stratums\Repositories\Interfaces\StratumRepositoryInterface;
use App\Entities\Generals\VehicleBrands\Repositories\Interfaces\VehicleBrandRepositoryInterface;
use App\Entities\Generals\VehicleTypes\Repositories\Interfaces\VehicleTypeRepositoryInterface;
use App\Entities\Generals\Epss\Repositories\Interfaces\EpsRepositoryInterface;
use App\Entities\Generals\Housings\Repositories\Interfaces\HousingRepositoryInterface;
use Modules\Customers\Entities\Customers\Customer;
use Modules\Customers\Entities\Customers\Repositories\CustomerRepository;
use Modules\Customers\Entities\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use Modules\Customers\Entities\Customers\Requests\CreateCustomerRequest;
use Modules\Customers\Entities\Customers\Requests\UpdateCustomerRequest;
use Modules\Customers\Entities\Customers\Transformations\CustomerTransformable;
use Modules\Customers\Entities\CustomerStatuses\Repositories\Interfaces\CustomerStatusRepositoryInterface;
use Modules\Customers\Entities\CustomerStatusesLogs\Repositories\Interfaces\CustomerStatusesLogRepositoryInterface;
use Modules\Customers\Entities\CustomerLeads\Repositories\Interfaces\CustomerLeadRepositoryInterface;
use App\Entities\Generals\EconomicActivityTypes\Repositories\Interfaces\EconomicActivityTypeRepositoryInterface;


class CustomerController extends Controller
{
    use CustomerTransformable;

    private $customerInterface, $customerStatusInterface, $customerStatusesLogInterface;
    private $genreInterface, $cityInterface, $housingInterface;
    private $customerLeadInterface, $stratumInterface, $customerCivilStatusInterface;
    private $customerIdentityTypeInterface, $scholarityInterface;
    private $vehicleTypeInterface, $vehicleBrandInterface, $economicActivityInterface;
    private $professionsListInterface, $relationshipInterface, $epsInterface, $toolsInterface;


    public function __construct(
        CustomerRepositoryInterface $customerRepositoryInterface,
        CustomerStatusRepositoryInterface $customerStatusRepositoryInterface,
        CustomerStatusesLogRepositoryInterface $customerStatusesLogRepositoryInterface,
        GenreRepositoryInterface $GenreRepositoryInterface,
        CityRepositoryInterface $cityRepositoryInterface,
        HousingRepositoryInterface $housingRepositoryInterface,
        CustomerLeadRepositoryInterface $customerLeadRepositoryInterface,
        StratumRepositoryInterface $stratumRepositoryInterface,
        CivilStatusRepositoryInterface $civilStatusRepositoryInterface,
        IdentityTypeRepositoryInterface $identityTypeRepositoryInterface,
        ScholarityRepositoryInterface $scholarityRepositoryInterface,
        VehicleTypeRepositoryInterface $vehicleTypeRepositoryInterface,
        VehicleBrandRepositoryInterface $vehicleBrandRepositoryInterface,
        ProfessionsListRepositoryInterface $professionsListRepositoryInterface,
        RelationshipRepositoryInterface $relationshipRepositoryInterface,
        EpsRepositoryInterface $epsRepositoryInterface,
        EconomicActivityTypeRepositoryInterface $economicActivityRepositoryInterface,
        ToolRepositoryInterface $toolRepositoryInterface
    ) {
        $this->toolsInterface = $toolRepositoryInterface;
        $this->customerInterface            = $customerRepositoryInterface;
        $this->customerStatusInterface      = $customerStatusRepositoryInterface;
        $this->customerStatusesLogInterface = $customerStatusesLogRepositoryInterface;
        $this->genreInterface               = $GenreRepositoryInterface;
        $this->cityInterface                = $cityRepositoryInterface;
        $this->housingInterface             = $housingRepositoryInterface;
        $this->customerLeadInterface        = $customerLeadRepositoryInterface;
        $this->stratumInterface             = $stratumRepositoryInterface;
        $this->civilStatusInterface         = $civilStatusRepositoryInterface;
        $this->identityTypeInterface        = $identityTypeRepositoryInterface;
        $this->scholarityInterface          = $scholarityRepositoryInterface;
        $this->vehicleTypeInterface         = $vehicleTypeRepositoryInterface;
        $this->vehicleBrandInterface        = $vehicleBrandRepositoryInterface;
        $this->professionsListInterface     = $professionsListRepositoryInterface;
        $this->relationshipInterface        = $relationshipRepositoryInterface;
        $this->epsInterface                 = $epsRepositoryInterface;
        $this->economicActivityInterface    = $economicActivityRepositoryInterface;
        $this->middleware(['permission:customers, guard:employee']);
    }

    public function index(Request $request)
    {
        $skip = $this->toolsInterface->getSkip($request->input('skip'));
        $list = $this->customerInterface->listCustomers($skip * 30);

        if (request()->has('q')) {
            $list = $this->customerInterface->searchCustomer(request()->input('q'));
        }

        if (request()->has('t')) {
            $list = $this->customerInterface->searchTrashedCustomer(request()->input('t'));
        }

        $customers = $list->where('status', 1)->map(function (Customer $customer) {
            return $this->transformCustomer($customer);
        })->all();

        return view('customers::admin.customers.list', [
            'customers'     => $customers,
            'optionsRoutes' => 'admin.' . (request()->segment(2)),
            'user'          => auth()->guard('employee')->user(),
            'skip'          => $skip,
            'headers'       => ['ID', 'Nombre', 'Apellido', 'Fecha Ingreso', 'Lead', 'Estado', 'Opciones']
        ]);
    }

    public function create()
    {
        return view('customers::admin.customers.create', [
            'genres'         => $this->genreInterface->getAllGenresNames(),
            'customer_leads' => $this->customerLeadInterface->getAllCustomerLeadNames(),
            'scholarities'   => $this->scholarityInterface->getAllScholaritiesNames(),
            'civil_statuses' => $this->civilStatusInterface->getAllCivilStatusesNames(),
            'cities'         => $this->cityInterface->listCities()
        ]);
    }

    public function store(CreateCustomerRequest $request)
    {
        $customer = $this->customerInterface->createCustomer($request->except('_token', '_method'));

        $data = array(
            'customer_id' => $customer->id,
            'status'      => 'Creado',
            'employee_id' => auth()->guard('employee')->user()->id
        );

        $this->customerStatusesLogInterface->createCustomerStatusesLog($data);

        $request->session()->flash('message', 'Creación de Cliente Exitosa!');
        return redirect()->route('admin.customers.show', $customer->id);
    }

    public function show(int $id)
    {
        $customer = $this->customerInterface->findCustomerById($id);

        return view('customers::admin.customers.show', [
            'customer'                     => $customer,
            'currentStatus'                => $customer->customerStatus,
            'epss'                         => $this->epsInterface->getAllEpsNames(),
            'genres'                       => $this->genreInterface->getAllGenresNames(),
            'customer_leads'               => $this->customerLeadInterface->getAllCustomerLeadNames(),
            'scholarities'                 => $this->scholarityInterface->getAllScholaritiesNames(),
            'civil_statuses'               => $this->civilStatusInterface->getAllCivilStatusesNames(),
            'stratums'                     => $this->stratumInterface->getAllStratumsNames(),
            'cities'                       => $this->cityInterface->listCities(),
            'housings'                     => $this->housingInterface->getAllHousingsNames(),
            'identity_types'               => $this->identityTypeInterface->getAllIdentityTypesNames(),
            'vehicle_types'                => $this->vehicleTypeInterface->getAllVehicleTypesNames(),
            'vehicle_brands'               => $this->vehicleBrandInterface->getAllVehicleBrandsNames(),
            'professions_lists'            => $this->professionsListInterface->getAllProfessionsNames(),
            'relationships'                => $this->relationshipInterface->getAllRelationshipsNames(),
            'economic_activity_types'      => $this->economicActivityInterface->getAllEconomicActivityTypesNames()
        ]);
    }

    public function edit($id)
    {
        $customer = $this->customerInterface->findCustomerById($id);

        return view('customers::admin.customers.edit', [
            'customer'            => $customer,
            'customer_leads'      => $this->customerLeadInterface->getAllCustomerLeadNames(),
            'statuses'            => $this->customerStatusInterface->listCustomerStatuses(),
            'scholarities'        => $this->scholarityInterface->getAllScholaritiesNames(),
            'cities'              => $this->cityInterface->listCities(),
            'currentStatus'       => $customer->customerStatus->id,
            'lead'                => $customer->customerLead->id,
            'customer_scholarity' => $customer->scholarity->id,
            'customer_city'       => $customer->city->id
        ]);
    }

    public function update(UpdateCustomerRequest $request, $id)
    {
        $customer = $this->customerInterface->findCustomerById($id);
        $update   = new CustomerRepository($customer);
        $data     = $request->except('_method', '_token', 'password');

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }

        unset($customer->age);
        $update->updateCustomer($data);

        $customer = $this->customerInterface->findCustomerById($id);

        $customerStatusLog = array(
            'customer_id' => $customer->id,
            'status'      => $customer->customerStatus->status,
            'employee_id' => auth()->guard('employee')->user()->id
        );

        $this->customerStatusesLogInterface->createCustomerStatusesLog($customerStatusLog);
        $request->session()->flash('message', 'Actualización Exitosa!');

        return redirect()->route('admin.customers.show', $id);
    }

    public function destroy($id)
    {
        $customerRepo = new CustomerRepository($this->customerInterface->findCustomerById($id));
        $customerRepo->deleteCustomer();

        return redirect()->route('admin.customers.index')->with('message', 'Eliminado Satisfactoriamente');
    }
}
