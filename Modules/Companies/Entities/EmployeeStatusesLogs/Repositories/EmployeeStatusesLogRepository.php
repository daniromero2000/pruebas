<?php

namespace Modules\Companies\Entities\EmployeeStatusesLogs\Repositories;

use Illuminate\Database\QueryException;
use Illuminate\Support\Carbon;
use Modules\Companies\Entities\EmployeeStatusesLogs\EmployeeStatusesLog;
use Modules\Companies\Entities\EmployeeStatusesLogs\Repositories\Interfaces\EmployeeStatusesLogRepositoryInterface;
use Carbon\CarbonInterval;

class EmployeeStatusesLogRepository implements EmployeeStatusesLogRepositoryInterface
{

    public function __construct(
        EmployeeStatusesLog $EmployeeStatusesLog
    ) {
        $this->model = $EmployeeStatusesLog;
    }

    public function createEmployeeStatusesLog(array $attributes): EmployeeStatusesLog
    {
        try {
            $employeeStatusesLog = new EmployeeStatusesLog($attributes);
            $employeeCreatedAt   = $employeeStatusesLog->employee->created_at;
            $employeeStatusesLog->time_passed = $this->customerStatusDaysPassed($employeeCreatedAt);
            $employeeStatusesLog->save();

            return $employeeStatusesLog;
        } catch (QueryException $e) {
            abort(503, $e->getMessage());
        }
    }

    public function customerStatusDaysPassed($employeeCreatedAt)
    {
        return CarbonInterval::seconds($employeeCreatedAt->diffInSeconds(Carbon::now()))->cascade()->forHumans();
    }
}
