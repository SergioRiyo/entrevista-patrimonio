<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Emprestimo extends Model
{
    use SoftDeletes;
    protected $table = 'emprestimos';

    protected $fillable = 
    [
        'estabelecimento_requerente_id',
        'estabelecimento_atendente_id',
        'status',
    ];
    
    public function estabelecimentoRequerente(): BelongsTo
    {
        return $this->belongsTo(Estabelecimento::class, 'estabelecimento_requerente_id');
    }

    public function estabelecimentoAtendente(): BelongsTo
    {
        return $this->belongsTo(Estabelecimento::class, 'estabelecimento_atendente_id');
    }

    public function itens(): HasMany
    {
        return $this->hasMany(ItemEmprestimo::class, 'emprestimo_id');
    }
}
