<?php

namespace App\Http\Requests\Escola;

use Illuminate\Foundation\Http\FormRequest;

class EscolaAlterParams extends FormRequest
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
            'Escola' => 'required|'
        ];
    }

    public function messages()
    {
        return [
            'Escola.required' => 'O campo Nome da Escola é obrigatório'
        ];
    }

}
