<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Patrimonio extends Model
{
    protected $table = 'patrimonios';

    protected $fillable = [
        'estabelecimento_pai_id',
        'nome',
        'codigo',
        'tipo',
        'data_entrada',
        'data_baixa',
        'motivo_baixa',
    ];

    protected $casts = [
        'data_entrada' => 'date',
        'data_baixa' => 'date',
    ];

    public function estabelecimentoPai() : BelongsTo
    {
        return $this->belongsTo(Estabelecimento::class, 'estabelecimento_pai_id');
    }

    public function itensEmprestimos()
    {
        return $this->hasMany(ItemEmprestimo::class, 'patrimonio_id');
    }

    public function estaBaixado(): bool
    {
        return ! is_null($this->data_baixa);
    }
}
