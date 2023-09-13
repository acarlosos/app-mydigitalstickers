<?php

namespace App\Http\Requests\Tela;

use Illuminate\Foundation\Http\FormRequest;

class TelaAlter extends FormRequest
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
            'Tela' => 'required|',
            'TelaStatus' => 'required|'
        ];
    }

    public function messages()
    {
        return [
            'Tela.required' => 'O campo Nome da Tela é obrigatório',
            'TelaStatus.required' => 'O campo Status é obrigatório'
        ];
    }

}
