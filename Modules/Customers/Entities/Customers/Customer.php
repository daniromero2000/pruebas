<?php

namespace Modules\Customers\Entities\Customers;

use App\Entities\Generals\Cities\City;
use Modules\Customers\Entities\CustomerAddresses\CustomerAddress;
use Modules\Customers\Entities\CustomerPhones\CustomerPhone;
use Modules\Customers\Entities\CustomerEmails\CustomerEmail;
use Modules\Customers\Entities\CustomerCommentaries\CustomerCommentary;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Entities\Generals\CivilStatuses\CivilStatus;
use App\Entities\Generals\Genres\Genre;
use App\Entities\Generals\Scholarities\Scholarity;
use Modules\Customers\Entities\CustomerEconomicActivities\CustomerEconomicActivity;
use Modules\Customers\Entities\CustomerEpss\CustomerEps;
use Modules\Customers\Entities\CustomerIdentities\CustomerIdentity;
use Modules\Customers\Entities\CustomerStatuses\CustomerStatus;
use Modules\Customers\Entities\CustomerStatusesLogs\CustomerStatusesLog;
use Modules\Customers\Entities\CustomerLeads\CustomerLead;
use Modules\Customers\Entities\CustomerVehicles\CustomerVehicle;
use Modules\Customers\Entities\CustomerProfessions\CustomerProfession;
use Modules\Customers\Entities\CustomerReferences\CustomerReference;
use Nicolaslopezj\Searchable\SearchableTrait;

class Customer extends Authenticatable
{
    use Notifiable, SoftDeletes, SearchableTrait;

    protected $table = 'customers';

    protected $fillable = [
        'name',
        'last_name',
        'birthday',
        'scholarity_id',
        'password',
        'status',
        'customer_status_id',
        'customer_lead_id',
        'city_id',
        'data_politics',
        'genre_id',
        'customer_lead_id',
        'civil_status_id',
        'scholarity_id',
        'lead_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'deleted_at',
        'updated_at',
        'relevance',
        'genre'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
        'status'
    ];

    protected $dates  = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    protected $searchable = [
        'columns' => [
            'customers.name'                      => 10,
            'customers.last_name'                 => 5,
            'customer_identities.identity_number' => 10,
            'customer_phones.phone'               => 10,
            'customer_emails.email'               => 5,
        ],
        'joins' => [
            'customer_identities' => ['customers.id', 'customer_identities.customer_id'],
            'customer_phones'     => ['customers.id', 'customer_phones.customer_id'],
            'customer_emails'     => ['customers.id', 'customer_emails.customer_id'],
        ],
    ];

    public function searchCustomer($term)
    {
        return self::search($term);
    }

    public function customerAddresses()
    {
        return $this->hasMany(CustomerAddress::class)->whereStatus(true);
    }

    public function customerProfessions()
    {
        return $this->hasMany(CustomerProfession::class)->whereStatus(true)->with(['professionsList']);
    }

    public function customerIdentities()
    {
        return $this->hasMany(CustomerIdentity::class)->whereStatus(true)->with(['identityType', 'city']);
    }

    public function customerPhones()
    {
        return $this->hasMany(CustomerPhone::class)->whereStatus(true);
    }

    public function customerEpss()
    {
        return $this->hasMany(CustomerEps::class)->whereStatus(true);
    }

    public function customerReferences()
    {
        return $this->hasMany(CustomerReference::class)->whereStatus(true)->with(['customerPhone', 'relationship']);
    }

    public function customerEconomicActivities()
    {
        return $this->hasMany(CustomerEconomicActivity::class)->whereStatus(true)->with(['economicActivityType', 'professionsList', 'city']);
    }

    public function customerEmails()
    {
        return $this->hasMany(CustomerEmail::class)->whereStatus(true);
    }

    public function customerCommentaries()
    {
        return $this->hasMany(CustomerCommentary::class);
    }

    public function customerVehicles()
    {
        return $this->hasMany(CustomerVehicle::class)->whereStatus(true)->with(['vehicleBrand', 'vehicleType']);
    }

    public function customerStatus()
    {
        return $this->belongsTo(CustomerStatus::class);
    }

    public function customerStatusesLog()
    {
        return $this->hasMany(CustomerStatusesLog::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function customerLead()
    {
        return $this->belongsTo(CustomerLead::class);
    }

    public function civilStatus()
    {
        return $this->belongsTo(CivilStatus::class);
    }

    public function scholarity()
    {
        return $this->belongsTo(Scholarity::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}