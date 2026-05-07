<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemEmprestimo extends Model
{
    protected $table = 'item_emprestimos';

    protected $fillable =
    [
        'emprestimo_id',
        'patrimonio_id',
        'data_emprestimo',
        'data_devolucao',
    ];

    protected $casts = 
    [
        'data_emprestimo' => 'date',
        'data_devolucao' => 'date',
    ];

    public function emprestimo(): BelongsTo
    {
        return $this->belongsTo(Emprestimo::class, 'emprestimo_id');
    }

    public function patrimonio(): BelongsTo
    {
        return $this->belongsTo(Patrimonio::class, 'patrimonio_id');
    }
}
