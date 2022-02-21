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
            $table->string('bairro');
            $table->unsignedBigInteger('id_loja_vendedora');
            $table->foreign('id_loja_vendedora')->references('id')->on('lojas')->onDelete('cascade');
            $table->string('nome_number');
            $table->date('dia_frete');
            $table->string('horario_frete')->nullable();
            $table->string('status_frete');
            $table->boolean('levar_maquina')->default(0);
            $table->bigInteger('valor_frete')->default(0);
            $table->tinyText('observacao')->nullable();
            $table->string('estoque_saida')->default('Canoas');
            $table->boolean('concluido')->default(0);
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
