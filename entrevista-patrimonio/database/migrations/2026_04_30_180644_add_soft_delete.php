<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('tipo_estabelecimentos', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('estabelecimentos', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('patrimonios', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('emprestimos', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('tipo_estabelecimentos', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('estabelecimentos', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('patrimonios', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('emprestimos', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
