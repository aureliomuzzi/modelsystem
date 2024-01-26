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
        Schema::create('preco', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('unidade_custo_id');
            $table->integer('unidade_por_lote');
            $table->decimal('custo_por_unidade', 10,2);
            $table->decimal('total_por_lote', 10,2);
            $table->integer('quantidade');
            $table->decimal('total_custo', 10,2);

            $table->unsignedBigInteger('unidade_venda_1_id');
            $table->decimal('fator_venda_1', 10,2); // em percentual 1,03 = 3% | 1,25 = 25%
            $table->decimal('valor_venda_1', 10,2);

            $table->unsignedBigInteger('unidade_venda_2_id')->nullable();
            $table->decimal('fator_venda_2', 10,2)->nullable(); // em percentual 1,03 = 3% | 1,25 = 25%
            $table->decimal('valor_venda_2', 10,2)->nullable();

            $table->timestamps();

            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
            $table->foreign('unidade_custo_id')->references('id')->on('unidade')->onDelete('cascade');
            $table->foreign('unidade_venda_1_id')->references('id')->on('unidade')->onDelete('cascade');
            $table->foreign('unidade_venda_2_id')->references('id')->on('unidade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preco');
    }
};
