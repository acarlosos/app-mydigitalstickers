<?php

namespace App\Http\Requests\Rede;

use Illuminate\Foundation\Http\FormRequest;

class RedeAlter extends FormRequest
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
            'Rede' => 'required|',
            'RedeCod' => 'required|',
            'RedeStatus' => 'required|'
        ];
    }

    public function messages()
    {
        return [
            'Rede.required' => 'O campo Rede é obrigatório',
            'RedeCod.required' => 'O campo Cod. Rede é obrigatório',
            'RedeStatus.required' => 'O campo Status é obrigatório'
        ];
    }

}
