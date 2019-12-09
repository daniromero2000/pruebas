<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_absences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('commentary', 250);
            $table->string('constancy')->default(0);
            $table->timestamp('start_date')->nullable();
            $table->timestamp('finish_date')->nullable();
            $table->integer('state_id')->default(1)->unsigned()->index();
            $table->foreign('state_id')->references('id')->on('employees_absences_states');
            $table->integer('employee_id')->unsigned()->index();
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->integer('boss_id')->unsigned()->index();
            $table->foreign('boss_id')->references('id')->on('employees');
            $table->integer('motive_id')->unsigned()->index();
            $table->foreign('motive_id')->references('id')->on('employee_motives');
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
        Schema::dropIfExists('employee_absences');
    }
}
