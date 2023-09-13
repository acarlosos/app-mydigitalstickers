<?php

namespace App\Http\Requests\InformativoAcesso;

use Illuminate\Foundation\Http\FormRequest;

class InformativoAcessoAlter extends FormRequest
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
            'InformativoAcesso' => 'required|',
            'InformativoAcessoDTIni' => 'required|',
            'InformativoAcessoDTFim' => 'required|'
        ];
    }

    public function messages()
    {
        return [
            'InformativoAcesso.required' => 'O campo de Acesso é obrigatório',
            'InformativoAcessoDTIni.required' => 'O campo Data de Inicio é obrigatório',
            'InformativoAcessoDTFim.required' => 'O campo Data Fim é obrigatório'
        ];
    }

}
