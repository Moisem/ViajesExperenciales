<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestReservacion extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'=>'require',
            'costo'=>'require',
            'fecha_salida'=>'require',
            'fecha_regreso'=>'require',
            'acompañantes'=>'require',
            'usuarios_id'=>'require',
        ];
    }
}
