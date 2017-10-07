<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtapaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etapas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('processos_id')->unsigned();
            $table->foreign('processos_id')->references('id')->on('processos');
            $table->string('nome');
            $table->text('descricao');
            $table->text('observacao');
            $table->boolean('desativado')->default('0');
            $table->boolean('verificacao')->default('0');;
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
        Schema::dropIfExists('etapas');
    }
}
