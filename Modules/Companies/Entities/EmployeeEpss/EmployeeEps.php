<?php

namespace Modules\Companies\Entities\EmployeeEpss;

use App\Entities\Generals\Epss\Eps;
use Modules\Companies\Entities\Employees\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class EmployeeEps extends Model
{
    use SoftDeletes;

    protected $table = 'employee_epss';

    public $fillable = [
        'eps_id',
        'employee_id',
        'status'
    ];

    protected $hidden = [
        'updated_at',
        'relevance',
        'eps_id',
        'id',
        'employee_id',
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

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function eps()
    {
        return $this->belongsTo(Eps::class);
    }
}
