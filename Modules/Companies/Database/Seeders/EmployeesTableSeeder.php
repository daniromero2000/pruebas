<?php

namespace Modules\Companies\Database\Seeders;

use Modules\Companies\Entities\Employees\Employee;
use Modules\Companies\Entities\Permissions\Permission;
use Modules\Companies\Entities\Actions\Action;
use Modules\Companies\Entities\ActionRole\ActionRole;
use Modules\Companies\Entities\Roles\Repositories\RoleRepository;
use Modules\Companies\Entities\Roles\Role;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    public function run()
    {
        // Módulo Empleados
        $moduleEmployees = factory(Permission::class)->create([
            'name'         => 'employees',
            'display_name' => 'Empleados',
            'icon'         => 'fas fa-user'
        ]);

        // Acciones Módulo Empleados
        $actionEmployeeViews = factory(Action::class)->create([
            'permission_id' => 1,
            'name'          => 'Ver Empleados',
            'icon'          => 'fas fa-eye',
            'route'         => 'admin.employees.index',
            'principal'     => 1
        ]);

        $actionEmployeeCreate = factory(Action::class)->create([
            'permission_id' => 1,
            'name'      => 'Crear Empleado',
            'icon'      => 'fas fa-plus',
            'route'     => 'admin.employees.create',
            'principal' => 1
        ]);

        $actionEmployeeUpdate = factory(Action::class)->create([
            'permission_id' => 1,
            'name'          => 'Editar Empleado',
            'icon'          => 'fas fa-edit',
            'route'         => 'admin.employees.edit',
            'principal'     => 0
        ]);

        $actionEmployeeShow = factory(Action::class)->create([
            'permission_id' => 1,
            'name'          => 'Ver Empleado',
            'icon'          => 'fas fa-search',
            'route'         => 'admin.employees.show',
            'principal'     => 0
        ]);

        $actionEmployeeDelete = factory(Action::class)->create([
            'permission_id' => 1,
            'name'          => 'Borrar Empleado',
            'icon'          => 'fas fa-times',
            'route'         => 'admin.employees.destroy',
            'principal'     => 0
        ]);

        // Módulo Ciudades
        $moduleCities = factory(Permission::class)->create([
            'name'         => 'countries',
            'display_name' => 'Ciudades',
            'icon'         => 'fas fa-flag'
        ]);

        // Acciones Módulo Ciudades
        $actionCityViews = factory(Action::class)->create([
            'permission_id' => 2,
            'name'          => 'Ver Ciudades',
            'icon'          => 'fas fa-eye',
            'route'         => 'admin.countries.index',
            'principal'     => 1
        ]);

        $actionCityShow = factory(Action::class)->create([
            'permission_id' => 2,
            'name'          => 'Ver Ciudad',
            'icon'          => 'fas fa-search',
            'route'         => 'admin.countries.show',
            'principal'     => 0
        ]);


        // Módulo Sucursales
        $moduleSubsidiaries = factory(Permission::class)->create([
            'name'         => 'subsidiaries',
            'display_name' => 'Sucursales',
            'icon'         => 'fas fa-map-marker'
        ]);

        // Acciones Módulo Sucursales
        $actionSubsidiarieViews = factory(Action::class)->create([
            'permission_id' => 3,
            'name'          => 'Ver Sucursales',
            'icon'          => 'fas fa-eye',
            'route'         => 'admin.subsidiaries.index',
            'principal'     => 1
        ]);

        $actionSubsidiarieCreate = factory(Action::class)->create([
            'permission_id' => 3,
            'name'          => 'Crear Sucursal',
            'icon'          => 'fas fa-plus',
            'route'         => 'admin.subsidiaries.create',
            'principal'     => 1
        ]);

        $actionSubsidiarieUpdate = factory(Action::class)->create([
            'permission_id' => 3,
            'name'          => 'Editar Sucursal',
            'icon'          => 'fas fa-edit',
            'route'         => 'admin.subsidiaries.edit',
            'principal'     => 0
        ]);

        $actionSubsidiarieShow = factory(Action::class)->create([
            'permission_id' => 3,
            'name'          => 'Ver Sucursal',
            'icon'          => 'fas fa-search',
            'route'         => 'admin.subsidiaries.show',
            'principal'     => 0
        ]);

        $actionSubsidiarieDelete = factory(Action::class)->create([
            'permission_id' => 3,
            'name'          => 'Borrar Sucursal',
            'icon'          => 'fas fa-times',
            'route'         => 'admin.subsidiaries.destroy',
            'principal'     => 0
        ]);

        // Módulo Roles
        $moduleRoles = factory(Permission::class)->create([
            'name'         => 'roles',
            'display_name' => 'Roles',
            'icon'         => 'fas fa-user-tag'
        ]);

        // Acciones Módulo Roles
        $actionRoleView = factory(Action::class)->create([
            'permission_id' => 4,
            'name'          => 'Ver Roles',
            'icon'          => 'fas fa-eye',
            'route'         => 'admin.roles.index',
            'principal'     => 1
        ]);

        $actionRoleCreate = factory(Action::class)->create([
            'permission_id' => 4,
            'name'          => 'Crear Rol',
            'icon'          => 'fas fa-plus',
            'route'         => 'admin.roles.create',
            'principal'     => 1
        ]);

        $actionRoleUpdate = factory(Action::class)->create([
            'permission_id' => 4,
            'name'          => 'Editar Rol',
            'icon'          => 'fas fa-edit',
            'route'         => 'admin.roles.edit',
            'principal'     => 0
        ]);

        $actionRoleShow = factory(Action::class)->create([
            'permission_id' => 4,
            'name'          => 'Ver Rol',
            'icon'          => 'fas fa-search',
            'route'         => 'admin.roles.show',
            'principal'     => 0
        ]);

        $actionRoleDelete = factory(Action::class)->create([
            'permission_id' => 4,
            'name'          => 'Borrar Rol',
            'icon'          => 'fas fa-times',
            'route'         => 'admin.roles.destroy',
            'principal'     => 0
        ]);

        // Módulo Permisos
        $modulePermission = factory(Permission::class)->create([
            'name'         => 'permissions',
            'display_name' => 'Permisos',
            'icon'         => 'fas fa-check-double'
        ]);

        // Acciones Módulo Permisos
        $actionPermissionView = factory(Action::class)->create([
            'permission_id' => 5,
            'name'          => 'Ver Permisos',
            'icon'          => 'fas fa-eye',
            'route'         => 'admin.permissions.index',
            'principal'     => 1
        ]);

        $actionPermissionCreate = factory(Action::class)->create([
            'permission_id' => 5,
            'name'          => 'Crear Permisos',
            'icon'          => 'fas fa-plus',
            'route'         => 'admin.permissions.create',
            'principal'     => 1
        ]);

        $actionPermissionUpdate = factory(Action::class)->create([
            'permission_id' => 5,
            'name'          => 'Editar Permisos',
            'icon'          => 'fas fa-edit',
            'route'         => 'admin.permissions.edit',
            'principal'     => 0
        ]);

        $actionPermissionShow = factory(Action::class)->create([
            'permission_id' => 5,
            'name'          => 'Ver Permiso',
            'icon'          => 'fas fa-search',
            'route'         => 'admin.permissions.show',
            'principal'     => 0
        ]);

        $actionPermissionDelete = factory(Action::class)->create([
            'permission_id' => 5,
            'name'          => 'Borrar Permiso',
            'icon'          => 'fas fa-times',
            'route'         => 'admin.permissions.destroy',
            'principal'     => 0
        ]);

        // Módulo PQRS
        $modulePqrs = factory(Permission::class)->create([
            'name'         => 'pqrs',
            'display_name' => 'PQR´s',
            'icon'         => 'fas fa-headset'
        ]);

        // Acciones Módulo PQRs
        $actionPqrsView = factory(Action::class)->create([
            'permission_id' => 6,
            'name'          => 'Ver PQR´s',
            'icon'          => 'fas fa-eye',
            'route'         => 'admin.pqrsdashboard',
            'principal'     => 1
        ]);

        $actionPqrsCreate = factory(Action::class)->create([
            'permission_id' => 6,
            'name'          => 'Crear PQR´s',
            'icon'          => 'fas fa-plus',
            'route'         => 'admin.pqrs.create',
            'principal'     => 1
        ]);

        $actionPqrsUpdate = factory(Action::class)->create([
            'permission_id' => 6,
            'name'          => 'Editar PQR´s',
            'icon'          => 'fas fa-edit',
            'route'         => 'admin.pqrs.edit',
            'principal'     => 0
        ]);

        $actionPqrsShow = factory(Action::class)->create([
            'permission_id' => 6,
            'name'          => 'Ver PQR´s',
            'icon'          => 'fas fa-search',
            'route'         => 'admin.pqrs.show',
            'principal'     => 0
        ]);

        $actionPqrsDelete = factory(Action::class)->create([
            'permission_id' => 6,
            'name'          => 'Borrar PQR´s',
            'icon'          => 'fas fa-times',
            'route'         => 'admin.pqrs.destroy',
            'principal'     => 0
        ]);


        // Módulo PQRS Statuses
        $modulePqrsStatuses = factory(Permission::class)->create([
            'name'         => 'pqrs-statuses',
            'display_name' => 'Estados PQRS',
            'icon'         => 'fas fa-headset'
        ]);

        // Acciones Módulo PQRs
        $actionPqrsStatusView = factory(Action::class)->create([
            'permission_id' => 7,
            'name'          => 'Ver Estados PQR´s',
            'icon'          => 'fas fa-eye',
            'route'         => 'admin.pqr-statuses.index',
            'principal'     => 1
        ]);

        $actionPqrsStatusCreate = factory(Action::class)->create([
            'permission_id' => 7,
            'name'          => 'Crear Estado PQR',
            'icon'          => 'fas fa-plus',
            'route'         => 'admin.pqr-statuses.create',
            'principal'     => 1
        ]);

        $actionPqrsStatusUpdate = factory(Action::class)->create([
            'permission_id' => 7,
            'name'          => 'Editar Estado PQR',
            'icon'          => 'fas fa-edit',
            'route'         => 'admin.pqr-statuses.edit',
            'principal'     => 0
        ]);

        $actionPqrsStatusDelete = factory(Action::class)->create([
            'permission_id' => 7,
            'name'          => 'Borrar Estado PQR',
            'icon'          => 'fas fa-times',
            'route'         => 'admin.pqr-statuses.destroy',
            'principal'     => 0
        ]);

        // Módulo Customers
        $moduleCustomers = factory(Permission::class)->create([
            'name'         => 'customers',
            'display_name' => 'Clientes',
            'icon'         => 'fas fa-address-book'
        ]);

        // Acciones Módulo PQRs
        $actionCustomerView = factory(Action::class)->create([
            'permission_id' => 8,
            'name'          => 'Ver Clientes',
            'icon'          => 'fas fa-eye',
            'route'         => 'admin.customers.index',
            'principal'     => 1
        ]);

        $actionCustomerCreate = factory(Action::class)->create([
            'permission_id' => 8,
            'name'          => 'Crear Cliente',
            'icon'          => 'fas fa-plus',
            'route'         => 'admin.customers.create',
            'principal'     => 1
        ]);

        $actionCustomerUpdate = factory(Action::class)->create([
            'permission_id' => 8,
            'name'          => 'Editar Cliente',
            'icon'          => 'fas fa-edit',
            'route'         => 'admin.customers.edit',
            'principal'     => 0
        ]);

        $actionCustomerShow = factory(Action::class)->create([
            'permission_id' => 8,
            'name'          => 'Ver Cliente',
            'icon'          => 'fas fa-eye',
            'route'         => 'admin.customers.show',
            'principal'     => 0
        ]);

        $actionCustomerDelete = factory(Action::class)->create([
            'permission_id' => 8,
            'name'          => 'Borrar Cliente',
            'icon'          => 'fas fa-times',
            'route'         => 'admin.customers.destroy',
            'principal'     => 0
        ]);


        // Módulo Customers Statuses
        $moduleCustomerStatuses = factory(Permission::class)->create([
            'name'         => 'customer-statuses',
            'display_name' => 'Estados Clientes',
            'icon'         => 'fas fa-address-book'
        ]);

        $actionCustomerStatusView = factory(Action::class)->create([
            'permission_id' => 9,
            'name'          => 'Ver Estados Cliente',
            'icon'          => 'fas fa-eye',
            'route'         => 'admin.customer-statuses.index',
            'principal'     => 1
        ]);

        $actionCustomerStatusCreate = factory(Action::class)->create([
            'permission_id' => 9,
            'name'          => 'Crear Estado Ciente',
            'icon'          => 'fas fa-plus',
            'route'         => 'admin.customer-statuses.create',
            'principal'     => 1
        ]);

        $actionCustomerStatusUpdate = factory(Action::class)->create([
            'permission_id' => 9,
            'name'          => 'Editar Estado Cliente',
            'icon'          => 'fas fa-edit',
            'route'         => 'admin.customer-statuses.edit',
            'principal'     => 0
        ]);

        $actionCustomerStatusDelete = factory(Action::class)->create([
            'permission_id' => 9,
            'name'          => 'Borrar Estado Cliente',
            'icon'          => 'fas fa-times',
            'route'         => 'admin.customer-statuses.destroy',
            'principal'     => 0
        ]);


        // Módulo Projects
        $moduleProjects = factory(Permission::class)->create([
            'name'         => 'projects',
            'display_name' => 'Proyectos',
            'icon'         => 'fas fa-address-book'
        ]);

        // Acciones Módulo PQRs
        $actionProjectView = factory(Action::class)->create([
            'permission_id' => 10,
            'name'          => 'Ver Proyectos',
            'icon'          => 'fas fa-eye',
            'route'         => 'admin.projects.index',
            'principal'     => 1
        ]);

        $actionProjectCreate = factory(Action::class)->create([
            'permission_id' => 10,
            'name'          => 'Crear Proyecto',
            'icon'          => 'fas fa-plus',
            'route'         => 'admin.projects.create',
            'principal'     => 1
        ]);

        $actionProjectUpdate = factory(Action::class)->create([
            'permission_id' => 10,
            'name'          => 'Editar Proyecto',
            'icon'          => 'fas fa-edit',
            'route'         => 'admin.projects.edit',
            'principal'     => 0
        ]);

        $actionProjectShow = factory(Action::class)->create([
            'permission_id' => 10,
            'name'          => 'Ver Proyecto',
            'icon'          => 'fas fa-eye',
            'route'         => 'admin.projects.show',
            'principal'     => 0
        ]);

        $actionProjectDelete = factory(Action::class)->create([
            'permission_id' => 10,
            'name'          => 'Borrar Proyecto',
            'icon'          => 'fas fa-times',
            'route'         => 'admin.projects.destroy',
            'principal'     => 0
        ]);

        // Módulo Projects
        $moduleActions = factory(Permission::class)->create([
            'name'         => 'actions',
            'display_name' => 'Acciones',
            'icon'         => 'fas fa-address-book'
        ]);

        // Acciones Módulo PQRs
        $actionActionsView = factory(Action::class)->create([
            'permission_id' => 11,
            'name'          => 'Ver Acciones',
            'icon'          => 'fas fa-eye',
            'route'         => 'admin.actions.index',
            'principal'     => 1
        ]);

        $actionActionsCreate = factory(Action::class)->create([
            'permission_id' => 11,
            'name'          => 'Crear Acción',
            'icon'          => 'fas fa-plus',
            'route'         => 'admin.actions.create',
            'principal'     => 1
        ]);

        $actionActionsEdit = factory(Action::class)->create([
            'permission_id' => 11,
            'name'          => 'Editar Acción',
            'icon'          => 'fas fa-edit',
            'route'         => 'admin.actions.edit',
            'principal'     => 0
        ]);

        $actionActionsShow = factory(Action::class)->create([
            'permission_id' => 11,
            'name'          => 'Ver Acción',
            'icon'          => 'fas fa-eye',
            'route'         => 'admin.actions.show',
            'principal'     => 0
        ]);

        $actionActionsDelete = factory(Action::class)->create([
            'permission_id' => 11,
            'name'          => 'Borrar Acción',
            'icon'          => 'fas fa-times',
            'route'         => 'admin.actions.destroy',
            'principal'     => 0
        ]);


        // Módulo Absenes
        $moduleAbsences = factory(Permission::class)->create([
            'name'         => 'absences',
            'display_name' => 'Ausencias',
            'icon'         => 'fas fa-address-book'
        ]);

        // Acciones Módulo PQRs
        $actionAbsencesView = factory(Action::class)->create([
            'permission_id' => 12,
            'name'          => 'Ver Ausencias',
            'icon'          => 'fas fa-eye',
            'route'         => 'admin.absences.index',
            'principal'     => 1
        ]);

        $actionAbsencesCreate = factory(Action::class)->create([
            'permission_id' => 12,
            'name'          => 'Crear Ausencia',
            'icon'          => 'fas fa-plus',
            'route'         => 'admin.absences.create',
            'principal'     => 1
        ]);

        $actionAbsencesEdit = factory(Action::class)->create([
            'permission_id' => 12,
            'name'          => 'Editar Ausencia',
            'icon'          => 'fas fa-edit',
            'route'         => 'admin.absences.edit',
            'principal'     => 0
        ]);

        $actionAbsencesShow = factory(Action::class)->create([
            'permission_id' => 12,
            'name'          => 'Ver Ausencia',
            'icon'          => 'fas fa-eye',
            'route'         => 'admin.absences.show',
            'principal'     => 0
        ]);

        $actionAbsencesDelete = factory(Action::class)->create([
            'permission_id' => 12,
            'name'          => 'Borrar Ausencia',
            'icon'          => 'fas fa-times',
            'route'         => 'admin.absences.destroy',
            'principal'     => 0
        ]);


        /*Creacion Usuario Super Admin Desarrollo*/
        $employee = factory(Employee::class)->create([
            'email' => 'desarrolladorcoandes@standard.com.co'
        ]);

        $super = factory(Role::class)->create([
            'name'         => 'superadmin',
            'display_name' => 'Desarrollo'
        ]);

        $roleSuperRepo = new RoleRepository($super);

        // Permiso Módulo Empleados
        $roleSuperRepo->attachToPermission($moduleEmployees);
        // Permisos Acciones Módulo Empleados
        $employeeAction = factory(ActionRole::class)->create([
            'action_id' => 1,
            'role_id'   => 1
        ]);

        $employeeAction = factory(ActionRole::class)->create([
            'action_id' => 2,
            'role_id'   => 1
        ]);

        $employeeAction = factory(ActionRole::class)->create([
            'action_id' => 3,
            'role_id'   => 1
        ]);

        $employeeAction = factory(ActionRole::class)->create([
            'action_id' => 4,
            'role_id'   => 1
        ]);

        $employeeAction = factory(ActionRole::class)->create([
            'action_id' => 5,
            'role_id'   => 1
        ]);

        // Permiso Módulo Ciudades
        $roleSuperRepo->attachToPermission($moduleCities);
        // Permisos Acciones Módulo Ciudades
        $cityAction = factory(ActionRole::class)->create([
            'action_id' => 6,
            'role_id'   => 1
        ]);

        $cityAction = factory(ActionRole::class)->create([
            'action_id' => 7,
            'role_id'   => 1
        ]);

        // Permiso Módulo Sucursales
        $roleSuperRepo->attachToPermission($moduleSubsidiaries);
        // Permisos Acciones Módulo Sucursales
        $subsidiarieAction = factory(ActionRole::class)->create([
            'action_id' => 8,
            'role_id'   => 1
        ]);

        $subsidiarieAction = factory(ActionRole::class)->create([
            'action_id' => 9,
            'role_id'   => 1
        ]);

        $subsidiarieAction = factory(ActionRole::class)->create([
            'action_id' => 10,
            'role_id'   => 1
        ]);

        $subsidiarieAction = factory(ActionRole::class)->create([
            'action_id' => 11,
            'role_id'   => 1
        ]);

        $subsidiarieAction = factory(ActionRole::class)->create([
            'action_id' => 12,
            'role_id'   => 1
        ]);

        // Permiso Módulo Roles
        $roleSuperRepo->attachToPermission($moduleRoles);
        // Permisos Acciones Módulo Roles
        $rolAction = factory(ActionRole::class)->create([
            'action_id' => 13,
            'role_id'   => 1
        ]);

        $rolAction = factory(ActionRole::class)->create([
            'action_id' => 14,
            'role_id'   => 1
        ]);

        $rolAction = factory(ActionRole::class)->create([
            'action_id' => 15,
            'role_id'   => 1
        ]);

        $rolAction = factory(ActionRole::class)->create([
            'action_id' => 16,
            'role_id'   => 1
        ]);

        $rolAction = factory(ActionRole::class)->create([
            'action_id' => 17,
            'role_id'   => 1
        ]);

        // Permiso Módulo Permisos
        $roleSuperRepo->attachToPermission($modulePermission);
        // Permisos Acciones Módulo Permisos
        $permissionAction = factory(ActionRole::class)->create([
            'action_id' => 18,
            'role_id'   => 1
        ]);

        $permissionAction = factory(ActionRole::class)->create([
            'action_id' => 19,
            'role_id'   => 1
        ]);

        $permissionAction = factory(ActionRole::class)->create([
            'action_id' => 20,
            'role_id'   => 1
        ]);

        $permissionAction = factory(ActionRole::class)->create([
            'action_id' => 21,
            'role_id'   => 1
        ]);

        $permissionAction = factory(ActionRole::class)->create([
            'action_id' => 22,
            'role_id'   => 1
        ]);

        // Permiso Módulo Pqrs
        $roleSuperRepo->attachToPermission($modulePqrs);
        // Permisos Acciones Módulo Pqrs
        $pqrsAction = factory(ActionRole::class)->create([
            'action_id' => 23,
            'role_id'   => 1
        ]);

        $pqrsAction = factory(ActionRole::class)->create([
            'action_id' => 24,
            'role_id'   => 1
        ]);

        $pqrsAction = factory(ActionRole::class)->create([
            'action_id' => 25,
            'role_id'   => 1
        ]);

        $pqrsAction = factory(ActionRole::class)->create([
            'action_id' => 26,
            'role_id'   => 1
        ]);

        $pqrsAction = factory(ActionRole::class)->create([
            'action_id' => 27,
            'role_id'   => 1
        ]);

        // Permiso Módulo Pqrs Statuses
        $roleSuperRepo->attachToPermission($modulePqrsStatuses);
        // Permisos Acciones Módulo Pqrs Statuses

        $pqrsStatusAction = factory(ActionRole::class)->create([
            'action_id' => 28,
            'role_id'   => 1
        ]);

        $pqrsStatusAction = factory(ActionRole::class)->create([
            'action_id' => 29,
            'role_id'   => 1
        ]);

        $pqrsStatusAction = factory(ActionRole::class)->create([
            'action_id' => 30,
            'role_id'   => 1
        ]);

        $pqrsStatusAction = factory(ActionRole::class)->create([
            'action_id' => 31,
            'role_id'   => 1
        ]);


        // Permiso Módulo Customers
        $roleSuperRepo->attachToPermission($moduleCustomers);
        // Permisos Acciones Módulo Customer
        $customerAction = factory(ActionRole::class)->create([
            'action_id' => 32,
            'role_id'   => 1
        ]);

        $customerAction = factory(ActionRole::class)->create([
            'action_id' => 33,
            'role_id'   => 1
        ]);

        $customerAction = factory(ActionRole::class)->create([
            'action_id' => 34,
            'role_id'   => 1
        ]);

        $customerAction = factory(ActionRole::class)->create([
            'action_id' => 35,
            'role_id'   => 1
        ]);

        $customerAction = factory(ActionRole::class)->create([
            'action_id' => 36,
            'role_id'   => 1
        ]);


        // Permiso Módulo Customers
        $roleSuperRepo->attachToPermission($moduleCustomerStatuses);
        // Permisos Acciones Módulo Customer

        $customerStatusAction = factory(ActionRole::class)->create([
            'action_id' => 37,
            'role_id'   => 1
        ]);

        $customerStatusAction = factory(ActionRole::class)->create([
            'action_id' => 38,
            'role_id'   => 1
        ]);

        $customerStatusAction = factory(ActionRole::class)->create([
            'action_id' => 39,
            'role_id'   => 1
        ]);

        $customerStatusAction = factory(ActionRole::class)->create([
            'action_id' => 40,
            'role_id'   => 1
        ]);


        // Permiso Módulo Projects
        $roleSuperRepo->attachToPermission($moduleProjects);
        // Permisos Acciones Módulo Project
        $ProjectAction = factory(ActionRole::class)->create([
            'action_id' => 41,
            'role_id'   => 1
        ]);

        $ProjectAction = factory(ActionRole::class)->create([
            'action_id' => 42,
            'role_id'   => 1
        ]);

        $ProjectAction = factory(ActionRole::class)->create([
            'action_id' => 43,
            'role_id'   => 1
        ]);

        $ProjectAction = factory(ActionRole::class)->create([
            'action_id' => 44,
            'role_id'   => 1
        ]);

        $ProjectAction = factory(ActionRole::class)->create([
            'action_id' => 45,
            'role_id'   => 1
        ]);


        // Permiso Módulo Actions
        $roleSuperRepo->attachToPermission($moduleActions);
        // Permisos Acciones Módulo actions
        $ActionsAction = factory(ActionRole::class)->create([
            'action_id' => 46,
            'role_id'   => 1
        ]);

        $ActionsAction = factory(ActionRole::class)->create([
            'action_id' => 47,
            'role_id'   => 1
        ]);

        $ActionsAction = factory(ActionRole::class)->create([
            'action_id' => 48,
            'role_id'   => 1
        ]);

        $ActionsAction = factory(ActionRole::class)->create([
            'action_id' => 49,
            'role_id'   => 1
        ]);

        $ActionsAction = factory(ActionRole::class)->create([
            'action_id' => 50,
            'role_id'   => 1
        ]);


        // Permiso Módulo Actions
        $roleSuperRepo->attachToPermission($moduleAbsences);
        // Permisos Acciones Módulo actions
        $absencesAction = factory(ActionRole::class)->create([
            'action_id' => 51,
            'role_id'   => 1
        ]);

        $absencesAction = factory(ActionRole::class)->create([
            'action_id' => 52,
            'role_id'   => 1
        ]);

        $absencesAction = factory(ActionRole::class)->create([
            'action_id' => 53,
            'role_id'   => 1
        ]);

        $absencesAction = factory(ActionRole::class)->create([
            'action_id' => 54,
            'role_id'   => 1
        ]);

        $absencesAction = factory(ActionRole::class)->create([
            'action_id' => 55,
            'role_id'   => 1
        ]);


        $employee->roles()->save($super);
    }
}
