<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tipoMaquinas extends Model
{
    use SoftDeletes;
    public function ordemDeServico()
    {
        return $this->hasMany(OrdemDeServico::class, 'tipo_maquinas_id');
    }
}
