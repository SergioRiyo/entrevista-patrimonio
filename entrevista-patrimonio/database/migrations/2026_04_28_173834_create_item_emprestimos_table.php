<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $table = 'itens_emprestimos';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item_emprestimos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emprestimo_id')
            ->constrained('emprestimos')
            ->restrictedOnDelete();

            $table->foreignId('patrimonio_id')
            ->constrained('patrimonios')
            ->restrictedOnDelete();

            $table->date('data_emprestimo');
            $table->date('data_devolucao');
            $table->timestamps();

            $table->unique(['emprestimo_id', 'patrimonio_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_emprestimos');
    }
};
