<?php

namespace App\Repositories;

use App\Contracts\Repositories\BaseRepositoryInterface;
use App\Models\TipoEstabelecimento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class TipoEstabelecimentoRepository extends BaseRepository implements BaseRepositoryInterface{

    public function __contruct(TipoEstabelecimento $model){
        parent::__construct($model);
    }
}