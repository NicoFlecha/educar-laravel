<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Tipo_Usuario extends Model
{
    protected $table = 'tipo_usuarios';
    protected $guarded = [];

    public function Usuarios ()
    {
        return $this->hasMany(User::class, 'tipo_usuario_id');
    }
}
