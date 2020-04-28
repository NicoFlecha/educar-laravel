<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Curso;

class Categoria extends Model
{
    protected $guarded = [];

    public function cursos ()
    {
        return $this->hasMany(Curso::class);
    }
}
