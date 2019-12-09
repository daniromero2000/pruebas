<?php

namespace Modules\EmployeeAbsences\Entities\EmployeeAbsences\Repositories\Interfaces;

use Illuminate\Support\Collection;
use Modules\EmployeeAbsences\Entities\EmployeeAbsences\EmployeeAbsence;


interface EmployeeAbsenceRepositoryInterface
{

    public function listEmployeeAbsences(int $totalView);

    public function createEmployeeAbsence(array $params): EmployeeAbsence;

    public function findEmployeeAbsenceById(int $id): EmployeeAbsence;

    public function findTrashedEmployeeAbsenceById(int $id): EmployeeAbsence;

    public function updateEmployeeAbsence(array $data): bool;

    public function getAllEmployeeAbsenceTimes(): Collection;

    public function searchTrashedEmployeeAbsence(string $text): Collection;

    public function deleteEmployeeAbsence(): bool;

    public function searchEmployeeAbsence(string $text): Collection;

    public function recoverTrashedEmployeeAbsence(): bool;
}
