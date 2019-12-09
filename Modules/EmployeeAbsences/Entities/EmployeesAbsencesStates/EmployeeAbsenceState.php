<?php

namespace Modules\EmployeeAbsences\Entities\EmployeesAbsencesStates;

use Illuminate\Database\Eloquent\Model;
use Modules\EmployeeAbsences\Entities\EmployeeAbsences\EmployeeAbsence;
use Nicolaslopezj\Searchable\SearchableTrait;

class EmployeeAbsenceState extends Model
{
    use  SearchableTrait;

    protected $table = 'employees_absences_states';

    protected $fillable = [
        'name',
        'color',
        'icon',
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
        'status'
    ];

    protected $dates  = [
        'deleted_at',
        'created_at',
        'updated_at',
        'start_date',
        'finish_date'
    ];

    // public function searchAbsence($term)
    // {
    //     return self::search($term);
    // }

    public function employeeAbsences()
    {
        return $this->hasMany(EmployeeAbsence::class);
    }
}
