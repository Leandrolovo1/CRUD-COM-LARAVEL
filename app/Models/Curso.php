<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{

    use SoftDeletes;
    public function aluno()
    {
        return $this->hasMany(Aluno::class);
    }
    public function disciplinas()
    {
        return $this->hasMany(Disciplina::class);
    }
}
