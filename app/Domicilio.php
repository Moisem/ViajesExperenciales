<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use App\Usuarios;
class Domicilio extends Model
{
    protected $tabla='domicilio';
    protected $guarded=['id'];
    protected $fillable=['estado', 'municipio', 'colonia','codigo_postal','calle','numero_interior',
    'numero_exterior','referencias','usuarios_id'];
    public function usuarios()
    {
        return $this->belongsTo(Usuarios::class);
    }
}
