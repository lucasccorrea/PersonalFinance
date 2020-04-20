<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedSmallInteger('tipo_operacao_id');
            $table->foreign('tipo_operacao_id')->references('id')->on('tipo_operacaos');
            $table->string('descricao', 250);
            $table->date('lancamento');
            $table->decimal('valor_original', 15,4);
            $table->decimal('desconto', 15,4)->nullable();
            $table->unsignedSmallInteger('forma_pagamento_id');
            $table->foreign('forma_pagamento_id')->references('id')->on('forma_pagamentos');
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
        Schema::dropIfExists('titulos');
    }
}
