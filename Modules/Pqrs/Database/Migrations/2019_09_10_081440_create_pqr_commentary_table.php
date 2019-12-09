<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePqrCommentaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pqr_commentaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('commentary');
            $table->string('user');
            $table->integer('pqr_id')->unsigned()->index();
            $table->foreign('pqr_id')->references('id')->on('pqrs');
            $table->tinyInteger('status')->unsigned()->default(1);
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
        Schema::dropIfExists('pqr_commentaries');
    }
}
