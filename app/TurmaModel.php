<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TurmaModel extends Model
{
    protected $table = "turma";
    protected $fillable = ['nome', 'sigla', 'curso_id'];
}
