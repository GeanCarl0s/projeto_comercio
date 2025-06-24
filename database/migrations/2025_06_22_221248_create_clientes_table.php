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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('nome_fantasia');
            $table->string('codigo_fiscal');
            $table->string('inscricao_estadual');
            $table->string('endereco');
            $table->string('numero');
            $table->string('bairro');
            $table->date('data_nascimento');
            $table->string('foto')->nullable();
            $table->foreignId('id_cidade')->constrained('cidades');
            $table->foreignId('id_estado')->constrained('estados');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
