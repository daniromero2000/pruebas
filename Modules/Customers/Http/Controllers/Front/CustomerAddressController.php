<?php

namespace Modules\Customers\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Modules\Customers\Entities\Addresses\Requests\CreateAddressRequest;
use Modules\Customers\Entities\Addresses\Requests\UpdateAddressRequest;
use Modules\Customers\Entities\Addresses\Repositories\AddressRepository;
use App\Entities\Generals\Cities\Repositories\Interfaces\CityRepositoryInterface;
use Modules\Customers\Entities\Addresses\Repositories\Interfaces\AddressRepositoryInterface;
use App\Entities\Generals\Countries\Repositories\Interfaces\CountryRepositoryInterface;
use App\Entities\Generals\Provinces\Repositories\Interfaces\ProvinceRepositoryInterface;

class CustomerAddressController extends Controller
{

    private $addressRepo;
    private $countryRepo;
    private $cityRepo;
    private $provinceRepo;


    public function __construct(
        AddressRepositoryInterface $addressRepository,
        CountryRepositoryInterface $countryRepository,
        CityRepositoryInterface $cityRepository,
        ProvinceRepositoryInterface $provinceRepository
    ) {
        $this->addressRepo  = $addressRepository;
        $this->countryRepo  = $countryRepository;
        $this->provinceRepo = $provinceRepository;
        $this->cityRepo     = $cityRepository;
    }


    public function index()
    {
        $customer = auth()->user();

        return view('front.customers.addresses.list', [
            'customer'  => $customer,
            'addresses' => $customer->addresses
        ]);
    }


    public function create()
    {
        $customer = auth()->user();

        return view('front.customers.addresses.create', [
            'customer'  => $customer,
            'countries' => $this->countryRepo->listCountries(),
            'cities'    => $this->cityRepo->listCities(),
            'provinces' => $this->provinceRepo->listProvinces()
        ]);
    }


    public function store(CreateAddressRequest $request)
    {
        $request['customer_id'] = auth()->user()->id;
        $this->addressRepo->createAddress($request->except('_token', '_method'));

        return redirect()->route('accounts', ['tab' => 'profile'])
            ->with('message', 'Address creation successful');
    }


    public function edit($addressId, $customerId)
    {
        $countries = $this->countryRepo->listCountries();
        $address   = $this->addressRepo->findCustomerAddressById($addressId, auth()->user());

        return view('front.customers.addresses.edit', [
            'customer'  => auth()->user(),
            'address'   => $address,
            'countries' => $countries,
            'cities'    => $this->cityRepo->listCities(),
            'provinces' => $this->provinceRepo->listProvinces()
        ]);
    }


    public function update(UpdateAddressRequest $request, $addressId)
    {
        $address = $this->addressRepo->findCustomerAddressById($addressId, auth()->user());
        $request = $request->except('_token', '_method');
        $request['customer_id'] = auth()->user()->id;
        $addressRepo = new AddressRepository($address);
        $addressRepo->updateAddress($request);

        return redirect()->route('accounts', ['tab' => 'profile'])
            ->with('message', 'Address update successful');
    }


    public function destroy($addressId, $customerId)
    {
        $address = $this->addressRepo->findCustomerAddressById($addressId, auth()->user());
        $address->delete();

        return redirect()->route('accounts',  ['tab' => 'profile'])
            ->with('message', 'Contacto Eliminado Satisfactoriamente');
    }
}
