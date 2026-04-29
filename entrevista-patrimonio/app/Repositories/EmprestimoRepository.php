<?php

namespace App\Repositories;

use App\Contracts\Repositories\EmprestimoRepositoryInterface;
use App\Models\Emprestimo;
use App\Models\ItemEmprestimo;
use App\Repositories\ItemEmprestimoRepository;

class EmprestimoRepository extends BaseRepository implements EmprestimoRepositoryInterface
{
    public function __construct(Emprestimo $model) 
    {
        parent::__construct($model);
    }

    public function adicionarItem (Emprestimo $emprestimo, array $data): ItemEmprestimo{
        return $emprestimo->itens()->create($data);
    }

    public function buscarComRelacionamentos (int $id): Emprestimo{
        return $this->model
        ->with(['estabelecimentoRequerente', 'estabelecimentoAtendente', 'itens'])
        ->findOrFail($id);
    }
    public function existeEmprestimoAtivoParaPatrimonio(int $patrimonioId): bool{
        return $this->model
            ->newQuery()
            ->where('status', 'ativo')
            ->whereHas('itens', function ($query) use ($patrimonioId) {
                $query->where('patrimonio_id', $patrimonioId);
            })
            ->exists();
    }

}