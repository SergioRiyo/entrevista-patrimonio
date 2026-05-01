<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estabelecimento_requerente_id')
            ->constrained('estabelecimentos')
            ->onDelete('restrict');

            $table->foreignId('estabelecimento_atendente_id')
            ->constrained('estabelecimentos')
            ->onDelete('restrict');

            $table->enum('status', [
                'ativo',
                'finalizado',
                'cancelado'
            ]);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('emprestimos');
    }
};
