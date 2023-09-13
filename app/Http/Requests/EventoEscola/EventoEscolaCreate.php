<?php

namespace App\Http\Requests\EventoEscola;

use Illuminate\Foundation\Http\FormRequest;

class EventoEscolaCreate extends FormRequest
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

        
            'EventoID' => 'required|',
            'EscolaID' => 'required|'
        ];
    }

    public function messages()
    {
        return [

            
            'EventoID.required' => 'O campo EventoID é obrigatório',
            'EscolaID.required' => 'O campo EscolaID é obrigatório'
        ];
    }

}
