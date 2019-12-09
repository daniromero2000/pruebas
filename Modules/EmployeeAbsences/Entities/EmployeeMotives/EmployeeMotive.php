<?php

namespace Modules\EmployeeAbsences\Entities\EmployeeMotives;

use Illuminate\Database\Eloquent\Model;
use Modules\EmployeeAbsences\Entities\EmployeeAbsences\EmployeeAbsence;

class EmployeeMotive extends Model
{


    protected $table = 'employee_motives';

    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'relevance',    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $dates  = [
        'created_at',
        'updated_at',
        'start_date',
        'finish_date',
    ];

    public function EmployeeAbsence()
    {
        return $this->hasMany(EmployeeAbsence::class);
    }
}
