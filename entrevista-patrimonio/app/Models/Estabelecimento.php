<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estabelecimento extends Model
{
    use SoftDeletes;
    protected $table = 'estabelecimentos';

    protected $fillable = [
        'tipo_estabelecimento_id',
        'nome',
        'cnpj',
        'prazo_maximo_emprestimo_dias',
    ];

    protected $casts = [
        'prazo_maximo_emprestimo_dias' => 'integer',
    ];

    public function tipoEstabelecimento(): BelongsTo
    {
        return $this->belongsTo(TipoEstabelecimento::class, 'tipo_estabelecimento_id');
    }

    public function patrimonios(): HasMany
    {
        return $this->hasMany(Patrimonio::class, 'estabelecimento_pai_id');
    }

    public function emprestimosSolicitados(): HasMany
    {
        return $this->hasMany(Emprestimo::class, 'estabelecimento_requerente_id');
    }

    public function emprestimosAtendidos(): HasMany
    {
        return $this->hasMany(Emprestimo::class, 'estabelecimento_atendente_id');
    }
}
