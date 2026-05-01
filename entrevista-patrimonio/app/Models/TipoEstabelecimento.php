<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoEstabelecimento extends Model
{
    use SoftDeletes;
    protected $table = 'tipo_estabelecimentos';

    protected $fillable = [
        'nome',
    ];

    public function estabelecimentos()
    {
        return $this->hasMany(Estabelecimento::class, 'tipo_estabelecimento_id');
    }
}
