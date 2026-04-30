<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmprestimoRequest;
use App\Models\Emprestimo;
use App\Services\EmprestimoService;
use App\Services\EstabelecimentoService;
use App\Services\PatrimonioService;

class EmprestimoController extends Controller
{
    public function __construct(
        private EmprestimoService $emprestimoService,
        private EstabelecimentoService $estabelecimentoService,
        private PatrimonioService $patrimonioService
    ) {}

    public function index()
    {
        $emprestimos = $this->emprestimoService->listar();

        return view('emprestimos.index', compact('emprestimos'));
    }

    public function create()
    {
        $estabelecimentos = $this->estabelecimentoService->listarTodos();
        $patrimonios = $this->patrimonioService->listarTodos();

        return view('emprestimos.create', compact('estabelecimentos', 'patrimonios'));
    }

    public function store(StoreEmprestimoRequest $request)
    {
        $emprestimo = $this->emprestimoService->criar($request->validated());

        return redirect()
            ->route('emprestimos.show', $emprestimo)
            ->with('success', 'Empréstimo cadastrado com sucesso.');
    }

    public function show(Emprestimo $emprestimo)
    {
        $emprestimo = $this->emprestimoService->buscarPorId($emprestimo->id);

        return view('emprestimos.show', compact('emprestimo'));
    }

    public function edit(Emprestimo $emprestimo)
    {
        abort(404);
    }

    public function update()
    {
        abort(404);
    }

    public function destroy(Emprestimo $emprestimo)
    {
        $this->emprestimoService->excluir($emprestimo->id);

        return redirect()
            ->route('emprestimos.index')
            ->with('success', 'Empréstimo excluído com sucesso.');
    }
}