<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemasUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temas_usuarios', function (Blueprint $table) {
            $table->bigInteger('tema_id')->unsigned();
            $table->bigInteger('usuario_id')->unsigned();
            $table->tinyInteger('nota')->unsigned()->nullable();
            $table->string('profesor_comentario')->nullable();
            $table->timestamps();

            $table->foreign('tema_id')->references('id')->on('temas')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');

            $table->unique(['tema_id', 'usuario_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temas_usuarios');
    }
}
