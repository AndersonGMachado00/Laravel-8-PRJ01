<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\Nullable;

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
        $id = $this->segment(2);

        $Rules = [
            'descricao' => ['required',       // 1 Forma de validar a entrada de dados no banco.
                            'min:3',
                            'max:160',
                            //'unique:produtos,descricao,{$id},id',
                            Rule::unique('Produtos')->ignore($id),
                        ],
            'unidade' => ['required', 'min:1', 'max:10'], // 2 Forma de validar a entrada de dados no banco.
            'valor' => 'required',
            'imagem' => ['required', 'image'],
        ];
        if ($this->method == 'PUT')
            {
                $Rules['imagem'] = ['Nullable', 'image' ];
            }
        return $Rules;
    }
}
