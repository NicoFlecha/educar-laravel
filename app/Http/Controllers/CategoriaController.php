<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Categoria;
use App\Curso;
use App\User;
use App\Profesor;

class CategoriaController extends Controller
{
    public function mostrarCategorias()
    {
        $categorias = Categoria::All();

        dd ($categorias);
    }

    public function mostrarCursos ($idCurso)
    {
        try {
            $categoria = Categoria::find($idCurso);
            if ($categoria == null) {
                throw new Exception("La Categoria " . $idCurso . " no existe");
            }
            $cursos = $categoria->cursos;
        } catch (\Throwable $th) {
            dd($th);
        }
        return $cursos;
    }
}
