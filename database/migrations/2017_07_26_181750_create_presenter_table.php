<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresenterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('presenters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guess');
            $table->integer('footprint_id')->unsigned();
            $table->foreign('footprint_id')->references('id')->on('footprints');
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
        Schema::drop('presenters');
    }
}
