<?php

use Illuminate\Database\Seeder;

class Tipo_UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_usuarios')->insert([
            ['tipo' => 'Alumno'],
            ['tipo' => 'Administrador']
        ]);

        App\Tipo_Usuario::All()->each(function ($tipo) {
            $tipo->usuarios()->saveMany(factory(App\User::class, 3)->make());
        });

        $alumnos = App\User::where('tipo_usuario_id', 1)->get();

        App\Curso::All()->each(function ($curso) use ($alumnos) {
            $curso->alumnos()->saveMany($alumnos);
        });

        App\Tema::All()->each(function ($temas) use ($alumnos) {
            $temas->alumnos()->saveMany($alumnos);
        });
    }
}
