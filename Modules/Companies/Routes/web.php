<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/**
 * Admin routes
 */
Route::namespace('Admin')->group(function () {
    Route::get('admin/login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('admin/login', 'LoginController@login')->name('admin.login');
    Route::get('admin/logout', 'LoginController@logout')->name('admin.logout');

    Route::view('admin/prueba', 'welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => ['employee'], 'as' => 'admin.'], function () {
    Route::namespace('Admin')->group(function () {
        Route::group([], function () {
            Route::get('/', 'DashboardController@index')->name('dashboard');
            Route::get('/redirectAction/{action}/', 'DashboardController@redirectAction')->name('redirectAction');

            Route::namespace('Subsidiaries')->group(function () {
                Route::resource('subsidiaries', 'SubsidiaryController');
                Route::get('subsidiaries/{subsidiary}/recover', 'SubsidiaryController@recoverTrashedSubsidiary')->name('subsidiaries.recover');
            });
        });

        Route::namespace('EmployeeEmails')->group(function () {
            Route::resource('employee-emails', 'EmployeeEmailController');
        });

        Route::namespace('EmployeePhones')->group(function () {
            Route::resource('employee-phones', 'EmployeePhoneController');
        });

        Route::namespace('EmployeeIdentities')->group(function () {
            Route::resource('employee-identities', 'EmployeeIdentityController');
        });

        Route::namespace('EmployeeAddresses')->group(function () {
            Route::resource('employee-addresses', 'EmployeeAddressController');
        });

        Route::namespace('EmployeeEpss')->group(function () {
            Route::resource('employee-epss', 'EmployeeEpsController');
        });

        Route::namespace('EmployeeProfessions')->group(function () {
            Route::resource('employee-professions', 'EmployeeProfessionController');
        });


        Route::group(['middleware' => ['role:superadmin, guard:employee']], function () {
            Route::resource('employees', 'EmployeeController');
            Route::get('employees/{employee}/profile', 'EmployeeController@getProfile')->name('employee.profile');
            Route::put('employees/{employee}/profile', 'EmployeeController@updateProfile')->name('employee.profile.update');
            Route::get('employees/{employee}/recover', 'EmployeeController@recoverTrashedEmployee')->name('employees.recover');

            Route::namespace('Roles')->group(function () {
                Route::resource('roles', 'RoleController');
                Route::get('roles/{role}/recover', 'RoleController@recoverTrashedRole')->name('roles.recover');
            });

            Route::namespace('Permissions')->group(function () {
                Route::resource('permissions', 'PermissionController');
                Route::get('permissions/{permission}/recover', 'PermissionController@recoverTrashedPermission')->name('permissions.recover');
            });


            Route::namespace('Actions')->group(function () {
                Route::resource('actions', 'ActionController');
                Route::get('actions/{actions}/recover', 'ActionController@recoverTrashedAction')->name('actions.recover');
            });
        });
        Route::resource('employee-commentaries', 'EmployeeCommentaries\EmployeeCommentaryController');
    });
});


/**
 * Frontend routes
 */

Auth::routes();
Route::namespace('Auth')->group(function () {
    Route::get('logout', 'LoginController@logout');
    Route::resource('auth', 'RegisterController');
});