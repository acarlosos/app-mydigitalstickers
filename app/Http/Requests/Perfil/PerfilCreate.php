<?php

namespace App\Http\Requests\Perfil;

use Illuminate\Foundation\Http\FormRequest;

class PerfilCreate extends FormRequest
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
            'Perfil' => 'required|',
            'PerfilCod' => 'required|',
            'PerfilStatus' => 'required|'
        ];
    }

    public function messages()
    {
        return [
            'Perfil.required' => 'O campo Nome do Perfil é obrigatório',
            'PerfilCod.required' => 'O campo Cod. Perfil é obrigatório',
            'PerfilStatus.required' => 'O campo Status é obrigatório'
        ];
    }

}
