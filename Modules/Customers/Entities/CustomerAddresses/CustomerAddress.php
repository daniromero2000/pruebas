<?php

namespace Modules\Customers\Entities\CustomerAddresses;

use Modules\Customers\Entities\Customers\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Entities\Generals\Cities\City;
use App\Entities\Generals\Housings\Housing;
use App\Entities\Generals\Stratums\Stratum;

class CustomerAddress extends Model
{
    use SoftDeletes;

    protected $table = 'customer_addresses';

    public $fillable = [
        'customer_id',
        'housing_id',
        'time_living',
        'stratum_id',
        'customer_address',
        'city_id',
        'status'
    ];

    protected $hidden = [
        'updated_at',
        'relevance',
        'id',
        'customer_id',
        'status',
        'deleted_at'
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

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function housing()
    {
        return $this->belongsTo(Housing::class);
    }

    public function stratum()
    {
        return $this->belongsTo(Stratum::class);
    }
}
