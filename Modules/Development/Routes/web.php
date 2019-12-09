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

Route::prefix('development')->group(function () {
	Route::get('/', 'DevelopmentController@index');
});


Route::group(['prefix' => 'admin', 'middleware' => ['employee'], 'as' => 'admin.'], function () {

	Route::namespace('Admin')->group(function () {
		Route::namespace('Projects')->group(function () {
			/* Projects */
			Route::get('projects/{projects}/plan', 'ProjectsController@plan')->name('project.plan');
			Route::resource('projects', 'ProjectsController');
		});

		Route::namespace('Issues')->group(function () {
			/* Issues */
			Route::get('issues/search', 'IssuesController@search');
			Route::post('issues/statuschange', 'IssuesController@statuschange')->name('issue.statuschange');
			Route::post('issues/sprintchange', 'IssuesController@sprintchange')->name('sprint.sprintchange');
			Route::post('issues/quickAdd', 'IssuesController@quickAdd')->name('issue.add');
			Route::post('issues/sortorder', 'IssuesController@sortorder')->name('issue.sortorder');
			Route::resource('issues', 'IssuesController');
			Route::resource('issuestatuses', 'IssueStatusesController');
		});



		Route::namespace('Sprints')->group(function () {
			/* Sprints */
			Route::post('sprints/add', 'SprintsController@add')->name('sprint.add');
			Route::patch('sprints/activate', 'SprintsController@activate')->name('sprint.activate');
			Route::post('sprints/complete', 'SprintsController@complete');
			Route::resource('sprints', 'SprintsController');
		});

		// Route::namespace('definir')->group(function () {
		// 	Route::get('/', 'HomeController@index');
		// 	Route::get('home', 'HomeController@index');
		// 	Route::get('profile', 'UsersController@profile');
		// 	Route::get('settings', 'UsersController@settings');
		// });
	});
});





//Route::get('/', function () {
//	return redirect('auth/login');
//});
