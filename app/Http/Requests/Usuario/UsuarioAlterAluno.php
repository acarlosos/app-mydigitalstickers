<?php

namespace App\Http\Requests\Usuario;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioAlterAluno extends FormRequest
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
            'UsuarioSenha' => 'nullable|string',
            'ConfirmarUsuarioSenha' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'UsuarioSenha.required' => 'O campo Senha do Usuário é obrigatório',
            'ConfirmarUsuarioSenha.required' => 'O campo Confirmar Senha do Usuário é obrigatório'

        ];
    }

}
