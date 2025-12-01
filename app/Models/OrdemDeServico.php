<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdemDeServico extends Model
{
    use SoftDeletes;
    protected $table = 'ordem_servico';
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function status()
    {
        return $this->belongsTo(status::class, 'status_id');
    }
    public function tipoMaquina()
    {
        return $this->belongsTo(tipoMaquinas::class, 'tipo_maquinas_id');
    }

}
