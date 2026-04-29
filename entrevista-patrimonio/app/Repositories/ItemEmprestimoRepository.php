<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Contracts\Repositories\BaseRepositoryInterface;
use App\Models\ItemEmprestimo;

class ItemEmprestimoRepository extends BaseRepository implements BaseRepositoryInterface{

public function __construct(ItemEmprestimo $model){
    parent::__construct($model);
}
}