<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservaciones extends Model
{
    protected $tabla='reservaciones';
    protected $guarded=['id'];
    protected $fillable=['costo', 'fecha_salida', 'fecha_regreso','acompañantes','usuarios_id'];
}
