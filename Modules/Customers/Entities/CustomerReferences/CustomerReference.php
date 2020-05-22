<?php

namespace Modules\Customers\Entities\CustomerReferences;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Entities\Generals\Relationships\Relationship;
use Modules\Customers\Entities\CustomerPhones\CustomerPhone;
use Modules\Customers\Entities\Customers\Customer;

class CustomerReference extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'customer_id',
        'customer_phone_id',
        'relationship_id'
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

    public function customerPhone()
    {
        return $this->belongsTo(CustomerPhone::class)->with(['customer']);
    }

    public function relationship()
    {
        return $this->belongsTo(Relationship::class)->with(['referenceType']);
    }
}