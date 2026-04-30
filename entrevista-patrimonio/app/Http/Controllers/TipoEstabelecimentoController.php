<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTipoEstabelecimentoRequest;
use App\Http\Requests\UpdateTipoEstabelecimentoRequest;
use App\Models\TipoEstabelecimento;
use App\Services\EstabelecimentoService;
use App\Services\TipoEstabelecimentoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TipoEstabelecimentoController extends Controller
{
    public function __construct(private TipoEstabelecimentoService $tipo_estabelecimento_service)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tipos = $this->tipo_estabelecimento_service->listar();

        return view('tipo-estabelecimentos.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipo-estabelecimentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipoEstabelecimentoRequest $request)
    {
        $this->tipo_estabelecimento_service->criar($request->validated());

        return redirect()->route('tipo-estabelecimentos.index')->with('success','Cadastrado');
    }

    /**
     * Display the specified resource.    
     */
    public function show(TipoEstabelecimento $tipoEstabelecimento)
    {
        return view('tipo-estabelecimentos.show', compact('tipoEstabelecimento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoEstabelecimento $tipoEstabelecimento)
    {
        return view('tipo-estabelecimentos.edit', compact('tipoEstabelecimento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateTipoEstabelecimentoRequest $request,
        TipoEstabelecimento $tipo_estabelecimento)
    {
        $this->tipo_estabelecimento_service->atualizar($tipo_estabelecimento->id, $request->validated());
        return redirect()
        ->route('tipo-estabelecimentos.index')
        ->with('success','Atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoEstabelecimento $tipoEstabelecimento)
    {
        $this->tipo_estabelecimento_service->excluir($tipoEstabelecimento->id);
        return redirect()->route('tipo-estabelecimentos.index')
        ->with('success', 'excluído!');
    }
}
