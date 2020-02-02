<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('users_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();            
            $table->string('password');
            $table->string('address');
            $table->string('cep', 100);
            $table->string('neighoarhood');
            $table->string('phone', 30);
            $table->string('cellphone', 30); 
            $table->string('image')->nullable(); 
            $table->string('image_legend')->nullable(); 
            $table->string('image_credits')->nullable(); 
            $table->integer('countries_id')->unsigned();
            $table->integer('states_id')->unsigned();
            $table->integer('cities_id')->unsigned();
            $table->integer('sexes_id')->unsigned();
            $table->integer('status')->unsigned();            
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
        Schema::drop('users');
    }
}
