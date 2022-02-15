<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeAssistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_loja');
            $table->foreign('id_loja')->references('id')->on('lojas')->onDelete('cascade');
            $table->string('nome_cliente')->nullable();
            $table->string('endereco')->nullable();
            $table->string('telefone_cliente')->nullable();
            $table->string('produto_assistencia');
            $table->date('data_assistencia');
            $table->boolean('done')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
