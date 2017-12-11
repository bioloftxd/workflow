<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProcessoIniciarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('processo_iniciar', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('processos_id')->unsigned();
          $table->foreign('processos_id')->references('id')->on('processos');
          $table->integer('usuario_id')->unsigned();
          $table->foreign('usuario_id')->references('id')->on('users');
          $table->string('nome');
          $table->dateTime('data_inicio');
          $table->dateTime('data_final');
          $table->boolean('verificar')->default('0');
          $table->boolean('finalizado')->default('0');
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
        Schema::dropIfExists('processo_iniciar');
    }
}
