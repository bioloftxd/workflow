<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messengers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('users');
            $table->integer('processo_id')->unsigned();
            $table->foreign('processo_id')->references('id')->on('processos');
            $table->integer('etapa_id')->unsigned();
            $table->foreign('etapa_id')->references('id')->on('etapas');
            $table->text('mensagem')->nullable();
            $table->string('status_admin');
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
        Schema::dropIfExists('messengers');
    }
}
