<?php

namespace App\Http\Requests\Escola;

use Illuminate\Foundation\Http\FormRequest;

class EscolaCreate extends FormRequest
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
            'Escola' => 'required|',
            'EscolaCod' => 'required|',
            'EscolaStatus' => 'required|',
            'EscolaSenha' => 'required|',
            'EscolaDiaVencimento' => 'max:30|min:1',
            'EscolaValorVaviavel' => 'required|regex:/^\d+(\,\d{1,2})?$/',
            'EscolaValorFixo' => 'required|regex:/^\d+(\,\d{1,2})?$/'
        ];
    }

    public function messages()
    {
        return [
            'Escola.required' => 'O campo Nome da Escola é obrigatório',
            'EscolaCod.required' => 'O campo Cod. Escola é obrigatório',
            'EscolaSenha.required' => 'O campo Senha Escola é obrigatório',
            'EscolaValorFixo.required' => 'O campo Valor Fixo é obrigatório',
            'EscolaValorFixo.regex' => 'O campo Valor Fixo deve contêr apenas números e vírgula',
            'EscolaValorVaviavel.required' => 'O campo Valor Variável é obrigatório',
            'EscolaValorVaviavel.regex' => 'O campo Valor Variável deve contêr apenas números e vírgula',
            'EscolaDiaVencimento.max' => 'O campo Dia Vencimento não pode ser maio que 30',
            'EscolaDiaVencimento.min' => 'O campo Dia Vencimento não pode ser menor que 1',
            'EscolaStatus.required' => 'O campo Status é obrigatório'
        ];
    }

}
