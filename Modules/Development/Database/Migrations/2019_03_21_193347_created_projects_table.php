<?php

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatedProjectsTable extends Migration
{

	/**
	 * Create projects table
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('employee_id')->unsigned()->index();
			$table->foreign('employee_id')->references('id')->on('employees');
			$table->string('name')->unique();
			$table->string('slug')->unique();
			$table->string('issue_prefix')->unique();
			$table->timestamp('deadline')->nullable();
			$table->SoftDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Drop projects table
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
	}
}
