<?php

namespace App\Repositories;

use App\Contracts\Repositories\BaseRepositoryInterface;
use App\Contracts\Repositories\PatrimonioRepositoryInterface;
use App\Models\Patrimonio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class PatrimonioRepository extends BaseRepository implements PatrimonioRepositoryInterface{

    public function __construct(Patrimonio $model){
        parent::__construct($model);
    }

    public function disponiveisPorEstabelecimento(int $estabelecimentoId): Collection{
        return $this->model  
        ->newQuery()
        ->where('estabelecimento_id', $estabelecimentoId)
        ->where('data_baixa', null)
        ->orderBy('nome')
        ->get();
    }

    public function comEmprestimoAtivo(): Collection{
        return $this->model
        ->newQuery()
        ->whereHas ('emprestimos', function($query){
            $query->whereNull('data_devolucao');
        })
        ->orderBy('nome')
        ->get();
    }

    public function baixar(int $id, string $data): Model{
        $patrimonio = $this->findOrFail($id);
        $patrimonio->update([
            'data_baixa' => $data,
            'motivo_baixa' => $data
            ]);
    return $patrimonio;
    }
}