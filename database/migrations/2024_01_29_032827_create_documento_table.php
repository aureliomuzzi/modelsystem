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
        Schema::create('documento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('caixa_id');
            $table->unsignedBigInteger('tipo_pagamento_id');
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('notas_id');
            $table->integer('numero')->unique()->index();
            $table->integer('serie');
            $table->decimal('valor_documento', 10,2);
            $table->string('chave_acesso')->nullable();
            $table->longText('xml_venda')->nullable();
            $table->timestamps();

            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('caixa_id')->references('id')->on('caixas');
            $table->foreign('tipo_pagamento_id')->references('id')->on('tipo_pagamento');
            $table->foreign('cliente_id')->references('id')->on('contatos');
            $table->foreign('notas_id')->references('id')->on('numero_notas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documento');
    }
};
