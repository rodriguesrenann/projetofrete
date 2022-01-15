<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFretesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fretes', function (Blueprint $table) {
            $table->id();
            $table->string('produto');
            $table->string('endereco_entrega');
            $table->unsignedBigInteger('id_loja_vendedora');
            $table->foreign('loja_id')->references('id')->on('lojas')->onDelete('cascade');
            $table->date('dia_frete');
            $table->dateTime('horario_frete')->nullable();
            $table->string('status_frete');
            $table->boolean('levar_maquina');
            $table->string('valor_frete')->nullable();
            $table->tinyText('observacao')->nullable();
            $table->string('estoque_saida');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fretes');
    }
}