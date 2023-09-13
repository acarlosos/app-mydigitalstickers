<?php

namespace App\Http\Requests\Ponto;

use Illuminate\Foundation\Http\FormRequest;

class PontoAlter extends FormRequest
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

            'PontoQuantidade' => 'required|',
            'PontoStatus' => 'required|',
            'UsuarioEscolaID' => 'required|'
            
        ];
    }

    public function messages()
    {
        return [

            'PontoQuantidade.required' => 'O campo Quantidade de Pontos é obrigatório',
            'PontoStatus.required' => 'O campo Status é obrigatório',
            'UsuarioEscolaID.required' => 'O campo Usuario Escola é obrigatório'
            
            
        ];
    }

}
