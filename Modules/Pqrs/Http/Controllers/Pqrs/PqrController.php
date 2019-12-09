<?php

namespace Modules\Pqrs\Http\Controllers\Pqrs;

use Modules\Pqrs\Entities\Pqrs\Pqr;
use Modules\Pqrs\Entities\Pqrs\Repositories\PqrRepository;
use Modules\Pqrs\Entities\Pqrs\Repositories\Interfaces\PqrRepositoryInterface;
use Modules\Pqrs\Entities\Pqrs\Requests\CreatePqrRequest;
use Modules\Pqrs\Entities\Pqrs\Requests\UpdatePqrRequest;
use Modules\Pqrs\Entities\Pqrs\Transformations\PqrTransformable;
use Modules\Pqrs\Entities\PqrStatuses\Repositories\Interfaces\PqrStatusRepositoryInterface;
use Modules\Pqrs\Entities\PqrsStatusesLogs\Repositories\Interfaces\PqrsStatusesLogRepositoryInterface;
use App\Entities\Generals\Cities\Repositories\Interfaces\CityRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Generals\Tools\ToolRepositoryInterface;


class PqrController extends Controller
{
    use PqrTransformable;

    private $pqrInterface;
    private $pqrsStatusesLogInterface;
    private $pqrStatusInterface;
    private $cityInterface;


    public function __construct(
        PqrRepositoryInterface $pqrRepositoryInterface,
        PqrStatusRepositoryInterface $pqrStatusRepository,
        CityRepositoryInterface $cityRepositoryInterface,
        PqrsStatusesLogRepositoryInterface $pqrsStatusesLogRepositoryInterface,
        ToolRepositoryInterface $toolRepositoryInterface
    ) {
        $this->toolsInterface           = $toolRepositoryInterface;
        $this->pqrsStatusesLogInterface = $pqrsStatusesLogRepositoryInterface;
        $this->pqrInterface             = $pqrRepositoryInterface;
        $this->pqrStatusInterface       = $pqrStatusRepository;
        $this->cityInterface            = $cityRepositoryInterface;
        $this->middleware(['permission:pqrs, guard:employee']);
    }


    public function index(Request $request)
    {
        $skip = $this->toolsInterface->getSkip($request->input('skip'));
        $list = $this->pqrInterface->listPqrs($skip * 30);

        if (request()->has('q')) {
            $list = $this->pqrInterface->searchPqr(request()->input('q'));
        }

        if (request()->has('t')) {
            $list = $this->pqrInterface->searchTrashedPqr(request()->input('t'));
        }

        $pqrs = $list->map(function (Pqr $pqr) {
            return $this->transformPqr($pqr);
        })->all();

        return view('pqrs::pqrs.list', [
            'pqrs'          => $pqrs,
            'skip'          => $skip,
            'optionsRoutes' => 'admin.' . (request()->segment(2)),
            'headers'       => ['ID', 'Usuario', 'Ingreso', 'Teléfono', 'Tipo Pqrs', 'Estado', 'Opciones']
        ]);
    }


    public function create()
    {
        return view('pqrs::pqrs.create', [
            'statuses' => $this->pqrStatusInterface->listPqrStatuses(),
            'cities'   => $this->cityInterface->listCities()
        ]);
    }


    public function store(CreatePqrRequest $request)
    {
        $data           = [];
        $pqrs           = $this->pqrInterface->createPqr($request->except('_token', '_method'));
        $data['pqr_id'] = $pqrs->id;
        $data['status'] = 'Creado';
        $data['user']     = auth()->guard('employee')->user()->id;

        $this->pqrsStatusesLogInterface->createPqrsStatusesLog($data);

        return redirect()->route('admin.pqrs.index');
    }


    public function show(int $id)
    {
        $pqr = $this->pqrInterface->findPqrById($id);

        return view('pqrs::pqrs.show', [
            'user'             => auth()->guard('employee')->user(),
            'pqr'              => $pqr,
            'pqrcommentaries'  => $pqr->pqrsCommentaries,
            'pqrsStatusesLogs' => $pqr->pqrsStatusesLog,
            'currentStatus'    => $pqr->pqrStatus,
            'city'             => $pqr->city,
            'headers'          => ['Comentario', 'Usuario', 'Fecha']
        ]);
    }

    public function edit($id)
    {
        $pqr = $this->pqrInterface->findPqrById($id);

        return view('pqrs::pqrs.edit', [
            'pqr'           => $pqr,
            'statuses'      => $this->pqrStatusInterface->listPqrStatuses(),
            'currentStatus' => $this->pqrStatusInterface->findPqrStatusById($pqr->pqr_status_id)
        ]);
    }


    public function update(UpdatePqrRequest $request, $id)
    {
        $pqr    = $this->pqrInterface->findPqrById($id);
        $update = new PqrRepository($pqr);
        $data   = $request->except('_method', '_token');
        $update->updatePqr($data);

        $pqr                    = $this->pqrInterface->findPqrById($id);
        $pqrStatusLog           = [];
        $pqrStatusLog['pqr_id'] = $pqr->id;
        $pqrStatusLog['status'] = $pqr->pqrStatus->name;
        $pqrStatusLog['user']   = auth()->guard('employee')->user()->name;
        $this->pqrsStatusesLogInterface->createPqrsStatusesLog($pqrStatusLog);
        $request->session()->flash('message', 'Actualización Exitosa!');

        return redirect()->route('admin.pqrs.show', $id);
    }


    public function destroy($id)
    {
        $pqr     = $this->pqrInterface->findPqrById($id);
        $pqrRepo = new PqrRepository($pqr);
        $pqrRepo->deletePqr();

        return redirect()->route('admin.pqrs.index')->with('message', 'Eliminado Satisfactoriamente');
    }


    public function recoverTrashedPqr(int $id)
    {
        $pqr     = $this->pqrInterface->findTrashedPqrById($id);
        $pqrRepo = new PqrRepository($pqr);
        $pqrRepo->recoverTrashedPqr();

        return redirect()->route('admin.pqrs.index')
            ->with('message', 'Recuperacióon Exitosa!');
    }
}
