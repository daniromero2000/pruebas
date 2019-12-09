<?php

namespace App\Entities\Generals\IdentityTypes;

use Illuminate\Database\Eloquent\Model;
use Modules\Customers\Entities\CustomerIdentities\CustomerIdentity;

class IdentityType extends Model
{

    protected $fillable = [
        'identity_type'
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

    public function customerIdentities()
    {
        return $this->hasMany(CustomerIdentity::class);
    }
}
