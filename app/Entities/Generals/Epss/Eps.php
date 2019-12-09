<?php

namespace  App\Entities\Generals\Epss;

use Modules\Companies\Entities\Employees\Employee;
use Illuminate\Database\Eloquent\Model;
use Modules\Customers\Entities\CustomerEpss\CustomerEps;

class Eps extends Model
{
    protected $table = 'epss';

    protected $fillable = [
        'eps'
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

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function customersEpss()
    {
        return $this->hasMany(CustomerEps::class);
    }
}
