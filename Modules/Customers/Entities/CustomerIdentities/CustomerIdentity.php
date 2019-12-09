<?php

namespace Modules\Customers\Entities\CustomerIdentities;

use Modules\Customers\Entities\Customers\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Entities\Generals\Cities\City;
use App\Entities\Generals\IdentityTypes\IdentityType;

class CustomerIdentity extends Model
{
    use SoftDeletes;

    public $fillable = [
        'identity_type_id',
        'identity_number',
        'expedition_date',
        'city_id',
        'customer_id',
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

    public function identityType()
    {
        return $this->belongsTo(IdentityType::class);
    }
}
