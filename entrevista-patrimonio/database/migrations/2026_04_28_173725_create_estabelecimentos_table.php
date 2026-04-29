<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $table = 'estabelecimentos';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estabelecimentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_estabelecimento_id')
            ->constrained('tipo_estabelecimentos')
            ->onDelete('restrict');

            $table->string('nome');
            $table->string('cnpj', 14)->unique();
            $table->unsignedInteger('prazo_maximo_emprestimo_dias')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estabelecimentos');
    }
};
