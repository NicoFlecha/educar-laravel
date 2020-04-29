<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_cursos', function (Blueprint $table) {
            $table->bigInteger('curso_id')->unsigned();
            $table->bigInteger('usuario_id')->unsigned();
            $table->tinyInteger('usuario_puntuacion')->unsigned()->nullable();
            $table->string('usuario_comentario')->nullable();
            $table->timestamps();

            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            
            $table->unique(['curso_id', 'usuario_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_cursos');
    }
}
