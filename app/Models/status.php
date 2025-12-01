<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class status extends Model
{
    use SoftDeletes;
    protected $table = 'status';
    public function ordemDeServico()
    {
        return $this->hasMany(OrdemDeServico::class);
    }
}
