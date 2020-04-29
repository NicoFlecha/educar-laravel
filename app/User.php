<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Tipo_Usuario;
use App\Curso;
use App\Tema;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tipo ()
    {
        return $this->belongsTo(Tipo_Usuario::class, 'tipo_usuario_id');
    }

    public function cursos ()
    {
        return $this->belongsToMany(Curso::class, 'usuarios_cursos', 'usuario_id', 'curso_id')->withPivot('usuario_puntuacion', 'usuario_comentario', 'created_at', 'updated_at');
    }

    public function temas () {
        return $this->belongsToMany(Tema::class, 'temas_usuarios', 'usuario_id', 'tema_id')->withPivot('nota','profesor_comentario', 'created_at', 'updated_at');
    }
}
