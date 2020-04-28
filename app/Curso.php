<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;
use App\User;
use App\Tema;
use App\Profesor;

class Curso extends Model
{
    protected $guarded = [];

    public function categoria ()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function alumnos ()
    {
        return $this->belongsToMany(User::class, 'usuarios_cursos', 'usuario_id', 'curso_id')->withPivot('usuario_puntuacion', 'usuario_comentario', 'created_at', 'updated_at');
    }

    public function temas () {
        return $this->hasMany(Tema::class);
    }
    
    public function profesores () 
    {
        return $this->belongsToMany(Profesor::class, 'cursos_profesores', 'curso_id', 'profesor_id');
    }
}
