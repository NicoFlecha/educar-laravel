<?php

use Illuminate\Database\Seeder;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Curso::class, 5)->create()->each(function ($curso) {
            $curso->categoria()->save(factory(App\Curso::class)->make());
        });
    }
}
