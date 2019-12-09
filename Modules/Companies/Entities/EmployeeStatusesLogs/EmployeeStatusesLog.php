<?php

namespace Modules\Companies\Entities\EmployeeStatusesLogs;

use Modules\Companies\Entities\Employees\Employee;
use Illuminate\Database\Eloquent\Model;

class EmployeeStatusesLog extends Model
{
    protected $fillable = [
        'employee_id',
        'status',
        'user_id',
        'time_passed'
    ];


    protected $hidden = [
        'id',
        'employee_id',
        'updated_at',
        'relevance'
    ];


    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    protected $dates  = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function user()
    {
        return $this->belongsTo(Employee::class);
    }
}
