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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('razao_social');
            $table->string('nome_fantasia')->nullable();
            $table->string('cnpj');
            $table->dateTime('data_abertura')->nullable();
            $table->enum('tipo_empresa', ['Matriz', 'Filial']);
            $table->unsignedBigInteger('matriz_id')->nullable();
            $table->string('logo')->nullable();            
            $table->string('telefone');
            $table->string('email');
            $table->boolean('status')->default(1);

            $table->string('cep', 10)->nullable();
            $table->string('logradouro')->nullable();
            $table->string('numero', 5)->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('localidade')->nullable();
            $table->string('uf', 2)->nullable();

            $table->timestamps();

            $table->foreign('matriz_id')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
