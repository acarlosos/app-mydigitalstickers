<?php

namespace App\Http\Requests\Ponto;

use Illuminate\Foundation\Http\FormRequest;

class PontoCreate extends FormRequest
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
            'UsuarioEscolaID' => 'required|'
        ];
    }

    public function messages()
    {
        return [
            'PontoQuantidade.required' => 'O campo Quantidade de Pontos é obrigatório',
            'UsuarioEscolaID.required' => 'O campo Usuario Escola é obrigatório'
            
        ];
    }

}
