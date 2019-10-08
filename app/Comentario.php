<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = ['id_usuario', 'id_post', 'id_responde', 'conteudo'];
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'comentarios';
    
    public function post() {
        return $this->belongsTo('App\Post', 'id', 'id_post');
    }
    
    public function autor() {
        return $this->belongsTo('App\Usuario', 'id_usuario', 'id')->getResults();
    }
    
    public function repostas() {
        return $this->hasMany('App\Comentario', 'id_responde', 'id');
    }
}
