<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuelos extends Model
{
    protected $tabla='vuelos';
    protected $guarded=['id'];
    protected $fillable=['pais', 'ciudad'];
    public function detalle_reservacion()
    {
        return $this->hasMany(Detalle_reservacion::class);
    }
}
