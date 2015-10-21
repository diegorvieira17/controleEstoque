<?php

namespace Estoque\Http\Requests;

use Estoque\Http\Requests\Request;

class ProdutosRequest extends Request
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
            'nome' => 'required|max:100',
            'descricao' => 'required|max:255',
            'valor' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute não pode ser vazio.', //altera todos os require de produtos
            'valor.required' => 'O campo :attribute deve ser maior que zero.', //altera o require de um campo específico de produtos
            'valor.numeric' => 'O campo :attribute deve ter um valor numérico.'
        ];
    }
}
