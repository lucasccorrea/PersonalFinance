<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTituloParcelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulo_parcelas', function (Blueprint $table) {
            $table->unsignedInteger('titulo_id');
            $table->foreign('titulo_id')->references('id')->on('titulos')->onUpdate('cascade')->onDelete('cascade');
            $table->smallInteger('sequencial_parcela');
            $table->decimal('valor_parcela', 15,4);
            $table->decimal('juros_multa', 15,4)->nullable();
            $table->decimal('desconto', 15,4)->nullable();
            $table->date('data_vencimento');
            $table->date('data_pagamento')->nullable();
            $table->unsignedSmallInteger('forma_pagamento_id');
            $table->foreign('forma_pagamento_id')->references('id')->on('forma_pagamentos');
            $table->unsignedSmallInteger('situacao_titulo_id');
            $table->foreign('situacao_titulo_id')->references('id')->on('situacao_titulos');
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
        Schema::dropIfExists('titulo_parcelas');
    }
}
