<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['titulo', 'resumo', 'conteudo', 'id_autor'];
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'posts';
    
}
