<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['nome', 'email', 'senha', 'role'];
    protected $guarded = ['created_at', 'updated_at'];
    protected $table = 'usuarios';
}
