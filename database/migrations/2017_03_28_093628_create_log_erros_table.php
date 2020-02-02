<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogErrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_erros', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('log_erros_id');
            $table->text('message')->nullable();
            $table->string('code')->nullable();
            $table->text('file')->nullable();
            $table->string('line')->nullable();         
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
        Schema::dropIfExists('log_erros');
    }
}
