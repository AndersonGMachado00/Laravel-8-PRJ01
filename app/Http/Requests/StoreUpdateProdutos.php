<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProdutos extends FormRequest
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
            'descricao' => 'required|min:3|max:160',      // 1 Forma de validar a entrada de dados no banco.
            'unidade' => ['required', 'min:1', 'max:10'], // 2 Forma de validar a entrada de dados no banco.
            'valor' => 'required',
        ];
    }
}
