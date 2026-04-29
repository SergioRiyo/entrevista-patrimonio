<?php

namespace App\Repositories;

use App\Contracts\Repositories\EmprestimoRepositoryInterface;
use App\Models\Emprestimo;

class EmprestimoRepository extends BaseRepository implements EmprestimoRepositoryInterface
{
    public function __construct(Emprestimo $model)
    {
        parent::__construct($model);
    }
}