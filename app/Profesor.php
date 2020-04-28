<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Curso;

class Profesor extends Model
{
    protected $table = 'profesores';
    protected $guarded = [];

    public function cursos ()
    {
        return $this->belongsToMany(Curso::class, 'cursos_profesores', 'profesor_id', 'curso_id');
    }
}
