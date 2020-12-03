<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservaciones extends Model
{
    protected $tabla='reservaciones';
    protected $guarded=['id'];
    protected $fillable=['costo', 'fecha_salida', 'fecha_regreso','acompañantes','users_id'];
    public function usuarios()
    {
        return $this->belongsTo(Users::class);
    }
    public function detalle_reservacion()
    {
        return $this->hasMany(Detalle_reservacion::class);
    }
}
