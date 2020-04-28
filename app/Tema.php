<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Curso;
use App\User;

class Tema extends Model
{
    protected $guarded = [];

    public function curso ()
    {
        return $this->belongsTo(Curso::class);
    }

    public function alumnos () {
        return $this->belongsToMany(User::class, 'temas_usuarios', 'tema_id', 'usuario_id')->withPivot('nota','profesor_comentario', 'created_at', 'updated_at');
    }
}
