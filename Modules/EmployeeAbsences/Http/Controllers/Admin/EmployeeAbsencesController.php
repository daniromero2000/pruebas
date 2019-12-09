<?php

namespace Modules\EmployeeAbsences\Http\Controllers\Admin;

use App\Entities\Generals\Tools\ToolRepositoryInterface;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\EmployeeAbsences\Entities\EmployeeMotives\EmployeeMotive;
use Modules\EmployeeAbsences\Entities\EmployeesAbsencesStates\EmployeeAbsenceState;
use Modules\EmployeeAbsences\Entities\EmployeeAbsences\EmployeeAbsence;
use Modules\EmployeeAbsences\Entities\EmployeeAbsences\Repositories\EmployeeAbsenceRepository;
use Modules\EmployeeAbsences\Entities\EmployeeAbsences\Repositories\Interfaces\EmployeeAbsenceRepositoryInterface;
use Modules\EmployeeAbsences\Entities\EmployeeAbsences\Requests\CreateEmployeeAbsenceRequest;
use Modules\EmployeeAbsences\Entities\EmployeeAbsences\Requests\UpdateEmployeeAbsenceRequest;
use Illuminate\Support\Carbon;


use App\Entities\Generals\Cities\City;


class EmployeeAbsencesController extends Controller
{

    private $employeeAbsenceInterface, $toolsInterface;

    public function __construct(
        EmployeeAbsenceRepositoryInterface $employeeAbsenceRepositoryInterface,
        ToolRepositoryInterface $toolRepositoryInterface
    ) {
        $this->toolsInterface = $toolRepositoryInterface;
        $this->absenceInterface = $employeeAbsenceRepositoryInterface;
        $this->middleware(['permission:absences, guard:employee']);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {

        $skip = $this->toolsInterface->getSkip($request->input('skip'));
        $list = $this->absenceInterface->listEmployeeAbsences($skip * 30);

        if (request()->has('q')) {
            $list = $this->AbsenceInterface->searchAbsence(request()->input('q'));
            $request->session()->flash('message', 'Resultado de la Busqueda');
        }

        if (request()->has('t')) {
            $list = $this->AbsenceInterface->searchTrashedAbsence(request()->input('t'));
            $request->session()->flash('message', 'Resultado de la Busqueda');
        }

        return view('employeeabsences::admin.Absences.list', [
            'employee_absences'    => $list,
            'optionsRoutes'        => 'admin.' . (request()->segment(2)),
            'skip'                 => $skip,
            'headers'              => ['#', 'Fecha y Hora de Inicio',  'Fecha y Hora Finalización', 'Opciones',]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $employee_user = auth()->guard('employee')->user()->id;
        $cities = city::all();
        return view('employeeabsences::admin.Absences.create', \compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $request['start_date'] = new Carbon($request['start_date']);
        $request['finish_date'] = new Carbon($request['finish_date']);

        $request['employee_id'] = auth()->guard('employee')->user()->id;
        $request['boss_id'] = auth()->guard('employee')->user()->id;

        $this->absenceInterface->createEmployeeAbsence($request->except('_token', '_method'));

        return redirect()->route('admin.Absences.index')
            ->with('message', 'Permiso Creado Exitosamente!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $motivo= EmployeeMotive::all();

        $estado= EmployeeAbsenceState::all();

        $absence = $this->absenceInterface->findEmployeeAbsenceById($id);
        // dd($absence->employeeMotive);
        // dd($absence->employee->department[0]->name);

        return view('employeeabsences::admin.absences.show', [
            'absence' => $absence,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $absence = $this->absenceInterface->findEmployeeAbsenceById($id);

        return view('companies::admin.Absences.show', [
            'absence' => $absence,
        ]);
        return view('employeeabsences::admin.Absences.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
