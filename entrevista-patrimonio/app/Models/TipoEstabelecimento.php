<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEstabelecimento extends Model
{
    protected $table = 'tipo_estabelecimentos';

    protected $fillable = [
        'nome',
    ];

    public function estabelecimentos()
    {
        return $this->hasMany(Estabelecimento::class, 'tipo_estabelecimento_id');
    }
}
