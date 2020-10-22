<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $tabla='usuarios';
    protected $guarded=['id'];
    protected $fillable=['nombre', 'apellido_paterno', 'apellido_materno','fecha_de_nacimiento',
    'telefono','email','email_verified_at','password','cargo'];
}
