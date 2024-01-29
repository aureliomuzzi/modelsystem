<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('caixa_fechamento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('caixa_id');
            $table->unsignedBigInteger('tipo_pagamento_id');
            $table->decimal('valor_fechamento', 10,2);
            $table->string('observacao',200)->nullable();
            $table->timestamps();

            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('caixa_id')->references('id')->on('caixas');
            $table->foreign('tipo_pagamento_id')->references('id')->on('tipo_pagamento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caixa_fechamento');
    }
};
