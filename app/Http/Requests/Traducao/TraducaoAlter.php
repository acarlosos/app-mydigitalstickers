<?php

namespace App\Http\Requests\Traducao;

use Illuminate\Foundation\Http\FormRequest;

class TraducaoAlter extends FormRequest
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
            'TraducaoTextoBr' => 'required|'
        ];
    }

    public function messages()
    {
        return [
            'TraducaoTextoBr.required' => 'O campo Br é obrigatório'
        ];
    }

}
