<?php

namespace Modules\Customers\Entities\CustomerEconomicActivities;

use App\Entities\Generals\Cities\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Customers\Entities\Customers\Customer;
use App\Entities\Generals\EconomicActivityTypes\EconomicActivityType;
use App\Entities\Generals\ProfessionsLists\ProfessionsList;

class CustomerEconomicActivity extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'customer_id',
        'economic_activity_type_id',
        'entity_name',
        'professions_list_id',
        'start_date',
        'incomes',
        'other_incomes',
        'other_incomes_source',
        'expenses',
        'entity_address',
        'entity_phone',
        'city_id',
        'status',
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
        'updated_at',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function economicActivityType()
    {
        return $this->belongsTo(EconomicActivityType::class);
    }

    public function professionsList()
    {
        return $this->belongsTo(ProfessionsList::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
