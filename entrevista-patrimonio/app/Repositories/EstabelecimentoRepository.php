<?php

namespace App\Repositories;

use App\Contracts\Repositories\BaseRepositoryInterface;
use App\Models\Estabelecimento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class EstabelecimentoRepository extends BaseRepository implements BaseRepositoryInterface{
    public function __construct(Estabelecimento $model){
        parent:: __construct($model);
    }
}