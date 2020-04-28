<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Categoria::class, 5)->create()->each(function ($categoria) {
            $categoria->cursos()->saveMany(factory(App\Curso::class, 7)->make());
        });

        $profesores = factory(App\Profesor::class, 3)->create();

        App\Curso::All()->each(function ($curso) use ($profesores) {
            $curso->profesores()->saveMany($profesores);
        });

        App\Curso::All()->each(function ($curso) {
            $curso->temas()->saveMany(factory(App\Tema::class, 5)->make());
        });
    }
}
