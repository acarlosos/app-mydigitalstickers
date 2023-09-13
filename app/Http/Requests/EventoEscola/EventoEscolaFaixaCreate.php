<?php

namespace App\Http\Requests\EventoEscola;

use Illuminate\Foundation\Http\FormRequest;

class EventoEscolaFaixaCreate extends FormRequest
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
            'FaixaEventoPontoQuantidade' => 'required|'
        ];
    }

    public function messages()
    {
        return [
            'FaixaEventoPontoQuantidade.required' => 'O campo Pontuação é obrigatório'
        ];
    }

}

