<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $table = 'patrimonios';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patrimonios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('estabelecimento_pai_id')
            ->constrained('estabelecimentos')
            ->restrictedOnDelete();

            $table->string('nome');
            $table->string('codigo')->unique();
            $table->enum('tipo', [
                'proprio',
                'alugado',
                'emprestado'
            ]);

            $table->date('data_entrada');
            $table->date('data_baixa')->nullable();
            $table->string('motivo_baixa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patrimonios');
    }
};
