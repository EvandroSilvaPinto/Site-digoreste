<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cities_id');
            $table->string('name');
            $table->integer('status')->unsigned();
            $table->integer('states_id')->unsigned();
            $table->integer('cd_ibge')->unsigned();
            $table->timestamps();
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->foreign('states_id')->references('states_id')->on('states');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('countries_id')->references('countries_id')->on('countries');
            $table->foreign('states_id')->references('states_id')->on('states');
            $table->foreign('cities_id')->references('cities_id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
