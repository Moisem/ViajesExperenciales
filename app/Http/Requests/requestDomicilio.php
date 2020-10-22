<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestDomicilio extends FormRequest
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
            'estado'=>'require',
            'municipio'=>'require',
            'colonia'=>'require',
            'codigo_postal'=>'require',
            'calle'=>'require',
            'numero_interior'=>'require',
            'numero_exterior'=>'require',
            'referencias'=>'require',
            'usuarios_id'=>'require',
        ];
    }
}
