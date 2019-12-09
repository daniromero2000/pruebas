<?php

namespace Modules\EmployeeAbsences\Providers;

use Modules\EmployeeAbsences\Entities\EmployeeAbsences\Repositories\Interfaces\EmployeeAbsenceRepositoryInterface;
use Modules\EmployeeAbsences\Entities\EmployeeAbsences\Repositories\EmployeeAbsenceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            EmployeeAbsenceRepositoryInterface::class,
            EmployeeAbsenceRepository::class
        );      
    }
}
