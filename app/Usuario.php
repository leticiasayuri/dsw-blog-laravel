<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $fillable = ['nome', 'email', 'senha', 'role'];
    protected $guarded = ['created_at', 'updated_at'];
    protected $table = 'usuarios';
    
    public function getAuthPassword() {
        return $this->senha;
    }
}
