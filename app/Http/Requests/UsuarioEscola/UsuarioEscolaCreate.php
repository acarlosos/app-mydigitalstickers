<?php

namespace App\Http\Requests\UsuarioEscola;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioEscolaCreate extends FormRequest
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

            'UsuarioEscolaStatus' => 'required|',
            'UsuarioNome' => 'required|'
        ];
    }

    public function messages()
    {
        return [

            'UsuarioEscolaStatus.required' => 'O campo Status é obrigatório',
            'UsuarioNome.required' => 'Deve selecionar ao menos um usuario',
        ];
    }

}
