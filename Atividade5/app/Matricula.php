<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    public function aluno(){
        return $this->belongsToMany('\App\Aluno');
    }

    public function disciplina(){
        return $this->belongsToMany('\App\Disciplina');
    }
}
