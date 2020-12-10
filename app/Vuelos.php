<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuelos extends Model
{
    protected $tabla='vuelos';
    protected $fillable=['pais', 'ciudad','descripcion'];
    public function detalle_reservacion()
    {
        return $this->hasMany(Detalle_reservacion::class);
    }
}
