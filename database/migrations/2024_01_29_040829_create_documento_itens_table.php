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
        Schema::create('documento_itens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('documento_id');
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('preco_id');
            $table->unsignedBigInteger('estoque_id')->nullable();
            $table->integer('quantidade');

            $table->timestamps();

            $table->foreign('documento_id')->references('id')->on('documento');
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('preco_id')->references('id')->on('preco');
            $table->foreign('estoque_id')->references('id')->on('estoque');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documento_itens');
    }
};
