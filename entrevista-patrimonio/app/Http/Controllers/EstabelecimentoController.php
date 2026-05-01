<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstabelecimentoRequest;
use App\Http\Requests\UpdateEstabelecimentoRequest;
use App\Models\Estabelecimento;
use App\Services\EstabelecimentoService;
use App\Services\TipoEstabelecimentoService;
use Illuminate\View\View;
class EstabelecimentoController extends Controller
{
    public function __construct(
        private  EstabelecimentoService $estabelecimentoService,
        private  TipoEstabelecimentoService $tipoEstabelecimentoService
    ) {}

    public function index()
    {
        $estabelecimentos = $this->estabelecimentoService->listar();

        return view('estabelecimentos.index', compact('estabelecimentos'));
    }

    public function create()
    {
        $tipos = $this->tipoEstabelecimentoService->listarTodos();

        return view('estabelecimentos.create', compact('tipos'));
    }

    public function store(StoreEstabelecimentoRequest $request)
    {
        $this->estabelecimentoService->criar($request->validated());

        return redirect()
            ->route('estabelecimentos.index')
            ->with('success', 'Estabelecimento cadastrado com sucesso.');
    }

    public function show(Estabelecimento $estabelecimento)
    {
        return view('estabelecimentos.show', compact('estabelecimento'));
    }

    public function edit(Estabelecimento $estabelecimento)
    {
        $tipos = $this->tipoEstabelecimentoService->listarTodos();

        return view('estabelecimentos.edit', compact('estabelecimento', 'tipos'));
    }

    public function update(
        UpdateEstabelecimentoRequest $request,
        Estabelecimento $estabelecimento
    ) {
        $this->estabelecimentoService->atualizar(
            $estabelecimento->id,
            $request->validated()
        );

        return redirect()
            ->route('estabelecimentos.index')
            ->with('success', 'Estabelecimento atualizado com sucesso.');
    }

    public function destroy(Estabelecimento $estabelecimento)
    {
        $this->estabelecimentoService->excluir($estabelecimento->id);

        return redirect()
            ->route('estabelecimentos.index')
            ->with('success', 'Estabelecimento excluído com sucesso.');
    }
}
