<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_reservacion extends Model
{
    protected $tabla='detalle_reservacion';
    protected $fillable=['estado', 'vuelos_id', 'reservaciones_id'];
    public function reservaciones()
    {
        return $this->belongsTo(Reservaciones::class);
    }
    public function vuelos()
    {
        return $this->belongsTo(Vuelos::class);
    }
}
