<?php

namespace Modules\EmployeeAbsences\Entities\EmployeeAbsences;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Companies\Entities\Employees\Employee;
use Modules\EmployeeAbsences\Entities\EmployeeMotives\EmployeeMotive;
use Modules\EmployeeAbsences\Entities\EmployeesAbsencesStates\EmployeeAbsenceState;
use Nicolaslopezj\Searchable\SearchableTrait;

class EmployeeAbsence extends Model
{
    use SoftDeletes, SearchableTrait;

    protected $table = 'employee_absences';

    protected $fillable = [
        'commentary',
        'constancy',
        'start_date',
        'finish_date',
        'state_id',
        'employee_id',
        'boss_id',
        'motive_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'relevance',
        'deleted_at'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'deleted_at',
        'updated_at',
        'state_id'
    ];

    protected $dates  = [
        'deleted_at',
        'created_at',
        'updated_at',
        'start_date',
        'finish_date',
        'state_id'
    ];

    protected $searchable = [
        'columns' => [
            'absences.employee_id' => 10,
        ],
    ];

    // public function searchAbsence($term)
    // {
    //     return self::search($term);
    // }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function EmployeeAbsenceState()
    {
        return $this->belongsTo(EmployeeAbsenceState::class);
    }
    public function employeemotive()
    {
        return $this->belongsTo(EmployeeMotive::class);
    }
}
