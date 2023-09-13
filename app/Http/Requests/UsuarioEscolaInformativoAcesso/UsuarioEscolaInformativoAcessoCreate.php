<?php

namespace App\Http\Requests\UsuarioEscolaInformativoAcesso;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioEscolaInformativoAcessoCreate extends FormRequest
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
            
            'UsuarioEscolaInformativoAcesso' => 'required|',
            'InformativoAcessoID' => 'required|'
        ];
    }

    public function messages()
    {
        return [
        
            'UsuarioEscolaInformativoAcesso.required' => 'O campo Acesso é obrigatório',
            'InformativoAcessoID.required' => 'O campo InformativoAcessoID é obrigatório'
        ];
    }

}
