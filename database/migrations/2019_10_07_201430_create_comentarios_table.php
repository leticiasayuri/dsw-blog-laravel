<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_post')->nullable();
            $table->unsignedBigInteger('id_responde')->nullable();
            $table->string('conteudo', 128);
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->foreign('id_post')->references('id')->on('posts');
            $table->foreign('id_responde')->references('id')->on('comentarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
