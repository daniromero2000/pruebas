<?php

namespace App\Entities\Generals\VehicleTypes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Customers\Entities\CustomerVehicles\CustomerVehicle;

class VehicleType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'vehicle_type'
    ];

    protected $hidden = [
        'customer_vehicle_type_id'
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


    public function customerVehicles()
    {
        $this->hasMany(CustomerVehicle::class);
    }
}
