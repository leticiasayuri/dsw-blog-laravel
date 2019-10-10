<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['titulo', 'resumo', 'conteudo', 'id_autor'];
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'posts';
    
    public function autor() {
        return $this->belongsTo('App\Usuario', 'id_autor', 'id')->getResults();
    }
    
    public function comentarios() {
        return $this->hasMany('App\Comentario', 'id_post', 'id')->getResults();
    }
    
    public function qtdComentarios(){
        return $this->comentarios()->count();
    }
}
