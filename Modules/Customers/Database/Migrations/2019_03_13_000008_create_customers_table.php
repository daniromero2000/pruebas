<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->date('birthday')->nullable();
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->integer('scholarity_id')->unsigned();
            $table->foreign('scholarity_id')->references('id')->on('scholarities');
            $table->string('password')->nullable();
            $table->integer('customer_lead_id')->unsigned();
            $table->foreign('customer_lead_id')->references('id')->on('customer_leads');
            $table->integer('civil_status_id')->unsigned();
            $table->foreign('civil_status_id')->references('id')->on('civil_statuses');
            $table->integer('genre_id')->unsigned();
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->integer('customer_status_id')->unsigned()->default(3);
            $table->foreign('customer_status_id')->references('id')->on('customer_statuses');
            $table->boolean('data_politics')->nullable();
            $table->tinyInteger('status')->unsigned()->default(1);
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('customers');
    }
}
