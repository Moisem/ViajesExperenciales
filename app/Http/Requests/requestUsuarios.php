<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestUsuarios extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
            'nombre'=>'require',
            'apellido_paterno'=>'require',
            'apellido_materno'=>'require',
            'fecha_de_nacimiento'=>'require',
            'telefono'=>'require',
            'email'=>'require',
            'email_verified_at'=>'require',
            'password'=>'require',
            'cargo'=>'require',
        ];
    }
}
