<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIssuesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('issues', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->text('description');
			$table->timestamp('deadline')->nullable();
			$table->integer('project_id')->unsigned();
			$table->foreign('project_id')->references('id')->on('projects');
			$table->integer('employee_id')->unsigned()->index();
			$table->foreign('employee_id')->references('id')->on('employees');
			$table->integer('type_id')->unsigned();
			$table->foreign('type_id')->references('id')->on('issue_types');
			$table->integer('sprint_id')->unsigned();
			$table->foreign('sprint_id')->references('id')->on('sprints');
			$table->integer('status_id')->unsigned()->default(2);
			$table->foreign('status_id')->references('id')->on('issue_statuses');
			$table->integer('priority_order')->unsigned()->default(0);
			$table->integer('sort_prev')->unsigned()->nullable();
			$table->integer('sort_next')->unsigned()->nullable();
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('issues');
	}
}
