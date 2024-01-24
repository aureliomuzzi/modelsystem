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
        Schema::create('contatos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_razao_social');
            $table->string('nome_fantasia')->nullable();
            $table->string('cpf_cnpj');
            $table->enum('tipo_contato', ['PF', 'PJ']);
            $table->dateTime('data_abertura')->nullable();

            $table->boolean('cliente')->nullable();
            $table->boolean('fornecedor')->nullable();
            $table->boolean('transportador')->nullable();

            $table->unsignedBigInteger('empresa_id')->nullable();

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

            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contatos');
    }
};
