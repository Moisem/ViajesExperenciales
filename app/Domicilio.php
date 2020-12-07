<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use App\Users;
class Domicilio extends Model
{
    protected $tabla='domicilio';
    protected $fillable=['users_id','estado', 'municipio', 'colonia','codigo_postal','calle','numero_interior',
    'numero_exterior','referencias'];
    public function usuarios()
    {
        return $this->belongsTo(Users::class);
    }
}
