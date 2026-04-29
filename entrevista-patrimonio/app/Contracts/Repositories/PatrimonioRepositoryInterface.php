<?php 

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface PatrimonioRepositoryInterface extends BaseRepositoryInterface{

    public function disponiveisPorEstabelecimento(int $estabelecimentoId): Collection;

    // ... outros métodos
    public function comEmprestimoAtivo(): Collection;

    public function baixar(int $id, string $data): Model;
}