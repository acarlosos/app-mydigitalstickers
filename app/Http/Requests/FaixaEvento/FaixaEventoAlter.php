<?php

namespace App\Http\Requests\FaixaEvento;

use Illuminate\Foundation\Http\FormRequest;

class FaixaEventoAlter extends FormRequest
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

        'FaixaEventoID' => 'required|',
        'FaixaEventoCod' => 'required|',
        'FaixaEventoStatus' => 'required|',
        'FaixaEventoNumIni' => 'required|',
        'FaixaEventoNumFim' => 'required|',
        'FaixaEventoDTIni' => 'required|',
        'FaixaEventoPontoQuantidade' => 'required|',
        'EventoEscolaID' => 'required|'
        ];
    }

    public function messages()
    {
        return [

        'FaixaEventoID.required' => 'O campo Faixa Evento é obrigatório',
        'FaixaEventoCod.required' => 'O campo Cod Faixa Evento é obrigatório',
        'FaixaEventoStatus.required' => 'O campo Status é obrigatório',
        'FaixaEventoNumIni.required' => 'O campo Numero Inicial é obrigatório',
        'FaixaEventoNumFim.required' => 'O campo Numero Final é obrigatório',
        'FaixaEventoDTIni.required' => 'O campo Data Inicial é obrigatório',
        'FaixaEventoDTFin.required' => 'O campo Data Final é obrigatório',
        'FaixaEventoPontoQuantidade.required' => 'O campo Ponto Quantidade é obrigatório',
        'EventoEscolaID.required' => 'O campo Evento Escola é obrigatório'

        ];
    }

}
