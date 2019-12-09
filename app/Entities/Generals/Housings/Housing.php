<?php

namespace App\Entities\Generals\Housings;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Customers\Entities\CustomerAddresses\CustomerAddress;

class Housing extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'housing'
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

    public function customerAddresses()
    {
        return $this->hasMany(CustomerAddress::class);
    }
}
