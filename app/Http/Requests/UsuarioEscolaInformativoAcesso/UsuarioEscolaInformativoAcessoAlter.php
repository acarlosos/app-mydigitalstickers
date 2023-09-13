<?php

namespace App\Http\Requests\UsuarioEscolaInformativoAcesso;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioEscolaInformativoAcessoAlter extends FormRequest
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
            'UsuarioEscolaInformativoAcesso' => 'required'
            ];
    }

    public function messages()
    {
        return [
            'UsuarioEscolaInformativoAcesso.required' => 'O campo Autenticação Acesso é obrigatório'
        ];
    }

}
