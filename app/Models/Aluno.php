<?php

namespace App\Models;

use App\Models\Curso;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use SoftDeletes;
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
    //
}
