<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Especialidade extends Model{
    protected $fillable = ['nome', 'descricao'];

    public function veterinarios() {
        return $this->hasMany('App\Veterinario');
    }
}
