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
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_pagamento_id'); // Cartão de Credito VISA, Cartão de Débito MASTERCARD
            $table->integer('quantidade_parcelas');
            $table->integer('prazo_em_dias'); //30, 60, 90
            $table->timestamps();

            $table->foreign('tipo_pagamento_id')->references('id')->on('tipo_pagamento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};
