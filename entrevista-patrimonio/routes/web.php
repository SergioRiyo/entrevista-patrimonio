<?php

use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\EstabelecimentoController;
use App\Http\Controllers\PatrimonioController;
use App\Http\Controllers\TipoEstabelecimentoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('emprestimos.index');
});
Route::get('patrimonios/disponiveis/{estabelecimento}',[PatrimonioController::class, 'disponiveisPorEstabelecimento'])->name('patrimonios.disponiveis');

Route::resource('tipo-estabelecimentos', TipoEstabelecimentoController::class);
Route::resource('estabelecimentos', EstabelecimentoController::class);
Route::resource('patrimonios', PatrimonioController::class);
Route::resource('emprestimos', EmprestimoController::class)->except(['edit', 'update']);

Route::patch('patrimonios/{patrimonio}/baixar', [PatrimonioController::class, 'baixar'])
    ->name('patrimonios.baixar');

