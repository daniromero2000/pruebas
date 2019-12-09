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
Route::group(['prefix' => 'admin', 'middleware' => ['employee'], 'as' => 'admin.'], function () {

    Route::namespace('Admin')->group(function () {
        Route::namespace('Customers')->group(function () {
            Route::resource('customers', 'CustomerController');
            Route::resource('customer-statuses', 'CustomerStatusController');
            Route::get('customers/{customer}/recover', 'CustomerController@recoverTrashedCustomer')->name('customers.recover');
        });

        Route::namespace('CustomerAddresses')->group(function () {
            Route::resource('customer-addresses', 'CustomerAddressController');
        });

        Route::namespace('CustomerIdentities')->group(function () {
            Route::resource('customer-identities', 'CustomerIdentityController');
        });

        Route::namespace('CustomerPhones')->group(function () {
            Route::resource('customer-phones', 'CustomerPhoneController');
        });

        Route::namespace('CustomerEpss')->group(function () {
            Route::resource('customer-epss', 'CustomerEpsController');
        });

        Route::namespace('CustomerReferences')->group(function () {
            Route::resource('customer-references', 'CustomerReferenceController');
        });

        Route::namespace('CustomerEconomicActivities')->group(function () {
            Route::resource('customer-economic-activities', 'CustomerEconomicActivityController');
        });

        Route::namespace('CustomerProfessions')->group(function () {
            Route::resource('customer-professions', 'CustomerProfessionController');
        });

        Route::namespace('CustomerVehicles')->group(function () {
            Route::resource('customer-vehicles', 'CustomerVehicleController');
        });

        Route::namespace('CustomerEmails')->group(function () {
            Route::resource('customer-emails', 'CustomerEmailController');
        });

        Route::namespace('CustomerCommentaries')->group(function () {
            Route::resource('customer-commentaries', 'CustomerCommentaryController');
        });
    });
});


/**
 * Frontend routes
 */
Route::namespace('Front')->group(function () {
    Route::group(['prefix' => 'front'], function () {
        Route::namespace('Pqrs')->group(function () {
            Route::resource('pqrs', 'PqrController');
        });
    });
});
