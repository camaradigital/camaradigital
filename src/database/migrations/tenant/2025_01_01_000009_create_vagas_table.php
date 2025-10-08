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
        Schema::create('vagas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained('empresas')->onDelete('cascade');
            $table->string('titulo');
            $table->text('descricao');
            $table->text('responsabilidades');
            $table->text('requisitos');
            $table->decimal('salario', 10, 2)->nullable();
            $table->string('tipo_contratacao'); // CLT, PJ, Estágio, etc.
            $table->string('localizacao');
            $table->enum('status', ['aberta', 'fechada', 'pausada'])->default('aberta');
            $table->date('data_expiracao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vagas');
    }
};
