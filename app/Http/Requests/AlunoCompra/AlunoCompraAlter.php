<?php

namespace App\Http\Requests\AlunoCompra;

use Illuminate\Foundation\Http\FormRequest;

class AlunoCompraAlter extends FormRequest
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

            'AlunoCompraQuantidade' => 'required|',
            'AlunoCompraStatus' => 'required|',
            'UsuarioEscolaID' => 'required|'
        ];
    }

    public function messages()
    {
        return [
            'AlunoCompraQuantidade.required' => 'O campo Quantidade Comprada é obrigatório',
            'AlunoCompraStatus.request' => 'O campo Status é obrigatório',
            'UsuarioEscolaID.required' => 'O campo Usuario Escola é obrigatório'
            
            
        ];
    }

}
