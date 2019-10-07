<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = ['id_usuario', 'id_post', 'id_responde', 'conteudo'];
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'comentarios';
}
