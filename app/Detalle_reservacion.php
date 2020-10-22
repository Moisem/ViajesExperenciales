<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_reservacion extends Model
{
    protected $tabla='detalle_reservacion';
    protected $guarded=['id'];
    protected $fillable=['estado', 'vuelos_id', 'reservacion_id'];
    
}
