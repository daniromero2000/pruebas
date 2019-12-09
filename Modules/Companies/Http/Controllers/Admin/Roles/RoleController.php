<?php

namespace Modules\Companies\Http\Controllers\Admin\Roles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Generals\Tools\ToolRepositoryInterface;
use Modules\Companies\Entities\Permissions\Repositories\Interfaces\PermissionRepositoryInterface;
use Modules\Companies\Entities\Roles\Repositories\RoleRepository;
use Modules\Companies\Entities\Roles\Repositories\Interfaces\RoleRepositoryInterface;
use Modules\Companies\Entities\Roles\Requests\CreateRoleRequest;
use Modules\Companies\Entities\Roles\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    private $roleInterface;
    private $permissionInterface;

    public function __construct(
        RoleRepositoryInterface $roleRepositoryInterface,
        PermissionRepositoryInterface $permissionRepositoryInterface,
        ToolRepositoryInterface $toolRepositoryInterface
    ) {
        $this->toolsInterface      = $toolRepositoryInterface;
        $this->roleInterface       = $roleRepositoryInterface;
        $this->permissionInterface = $permissionRepositoryInterface;
        $this->middleware(['permission:roles, guard:employee']);
    }

    public function index(Request $request)
    {
        $skip = $this->toolsInterface->getSkip($request->input('skip'));
        $list = $this->roleInterface->listRoles($skip * 30);

        if (request()->has('q')) {
            $list = $this->roleInterface->searchRole(request()->input('q'));
            $request->session()->flash('message', 'Resultado de la Busqueda');
        }

        if (request()->has('t')) {
            $list = $this->roleInterface->searchTrashedRole(request()->input('t'));
            $request->session()->flash('message', 'Resultado de la Busqueda');
        }

        return view('companies::admin.roles.list', [
            'roles'         => $list,
            'user'          => auth()->guard('employee')->user(),
            'optionsRoutes' => 'admin.' . (request()->segment(2)),
            'skip'          => $skip,
            'headers'       => ['ID', 'Nombre', 'Nombre Display', 'Descripción', 'Opciones',]
        ]);
    }

    public function create()
    {
        return view('companies::admin.roles.create');
    }

    public function store(CreateRoleRequest $request)
    {
        $this->roleInterface->createRole($request->except('_method', '_token'));

        return redirect()->route('admin.roles.index')
            ->with('message', 'Rol Credo Exitosamente!');
    }

    public function edit($id)
    {
        $role                        = $this->roleInterface->findRoleById($id);
        $roleRepo                    = new RoleRepository($role);
        $attachedPermissionsArrayIds = $roleRepo->listPermissions()->pluck('id')->all();

        return view('companies::admin.roles.edit', [
            'role'                        => $role,
            'permissions'                 => $this->permissionInterface->getAllPermissionNames(),
            'attachedPermissionsArrayIds' => $attachedPermissionsArrayIds
        ]);
    }

    public function update(UpdateRoleRequest $request, $id)
    {
        if ($request->has('permissions')) {
            $roleRepo = new RoleRepository($this->roleInterface->findRoleById($id));
            $roleRepo->syncPermissions($request->input('permissions'));
        }

        $this->roleInterface->updateRole($request->except('_method', '_token'), $id);

        return redirect()->route('admin.roles.index')
            ->with('message', 'Actualizado Satisfactoriamente!');
    }
}
