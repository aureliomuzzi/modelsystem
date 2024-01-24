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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->unsignedBigInteger('grupo_id');
            $table->unsignedBigInteger('subgrupo_id');
            $table->unsignedBigInteger('marca_id')->nullable();
            $table->unsignedBigInteger('contato_id');
            $table->unsignedBigInteger('unidade_id');
            $table->string('codigo_barras');
            
            $table->timestamps();

            $table->foreign('grupo_id')->references('id')->on('grupo');
            $table->foreign('subgrupo_id')->references('id')->on('subgrupo');
            $table->foreign('marca_id')->references('id')->on('marca');
            $table->foreign('contato_id')->references('id')->on('contatos');
            $table->foreign('unidade_id')->references('id')->on('unidade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
