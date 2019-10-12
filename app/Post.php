<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
    
    protected $fillable = ['titulo', 'resumo', 'conteudo', 'id_autor'];
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'posts';
    protected $softCascade = ['comentarios'];
    
    public function autor() {
        return $this->belongsTo('App\Usuario', 'id_autor', 'id')->getResults();
    }
    
    public function comentarios() {
        return $this->hasMany('App\Comentario', 'id_post', 'id');
    }
    
    public function qtdComentarios(){
        return $this->comentarios()->count();
    }
}
