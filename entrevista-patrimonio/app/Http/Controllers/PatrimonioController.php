<?php

namespace App\Http\Controllers;

use App\Http\Requests\BaixarPatrimonioRequest;
use App\Http\Requests\StorePatrimonioRequest;
use App\Http\Requests\UpdatePatrimonioRequest;
use App\Models\Patrimonio;
use App\Services\EstabelecimentoService;
use App\Services\PatrimonioService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PatrimonioController extends Controller
{
    public function __construct(
        private  PatrimonioService $patrimonioService,
        private  EstabelecimentoService $estabelecimentoService
    ) {}

    public function index()
    {
        $patrimonios = $this->patrimonioService->listar();

        return view('patrimonios.index', compact('patrimonios'));
    }

    public function create()
    {
        $estabelecimentos = $this->estabelecimentoService->listarTodos();

        return view('patrimonios.create', compact('estabelecimentos'));
    }

    public function store(StorePatrimonioRequest $request)
    {
        $this->patrimonioService->criar($request->validated());

        return redirect()
            ->route('patrimonios.index')
            ->with('success', 'Patrimônio cadastrado com sucesso.');
    }

    public function show(Patrimonio $patrimonio)
    {
        return view('patrimonios.show', compact('patrimonio'));
    }

    public function edit(Patrimonio $patrimonio)
    {
        $estabelecimentos = $this->estabelecimentoService->listarTodos();

        return view('patrimonios.edit', compact('patrimonio', 'estabelecimentos'));
    }

    public function update(UpdatePatrimonioRequest $request, Patrimonio $patrimonio) {
        $this->patrimonioService->atualizar(
            $patrimonio->id,
            $request->validated()
        );
        return redirect()
            ->route('patrimonios.index')
            ->with('success', 'Patrimônio atualizado com sucesso.');
    }

    public function destroy(Patrimonio $patrimonio)
    {
        $this->patrimonioService->excluir($patrimonio->id);

        return redirect()
            ->route('patrimonios.index')
            ->with('success', 'Patrimônio excluído com sucesso.');
    }

    public function baixar(BaixarPatrimonioRequest $request, Patrimonio $patrimonio)
    {
        $this->patrimonioService->baixar(
            $patrimonio->id,
            $request->validated()
        );

        return redirect()
            ->route('patrimonios.show', $patrimonio)
            ->with('success', 'Patrimônio baixado com sucesso.');
    }
}