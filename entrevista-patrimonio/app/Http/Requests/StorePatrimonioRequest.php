<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatrimonioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'estabelecimento_pai_id' => ['required', 'exists:estabelecimentos,id'],
            'nome' => ['required', 'string', 'max:255'],
            'codigo' => ['required', 'string', 'max:100', 'unique'],
            'tipo' => ['required', 'in:proprio,alugado,emprestado'],
            'data_entrada' => ['required', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'estabelecimento_pai_id.required' => 'Informe o estabelecimento pai.',
            'estabelecimento_pai_id.exists' => 'O estabelecimento informado não existe.',
            'nome.required' => 'Informe o nome do patrimônio.',
            'codigo.required' => 'Informe o código do patrimônio.',
            'codigo.unique' => 'Já existe um patrimônio com este código.',
            'tipo.required' => 'Informe o tipo do patrimônio.',
            'tipo.in' => 'O tipo deve ser próprio, alugado ou emprestado.',
            'data_entrada.required' => 'Informe a data de entrada.',
            'data_entrada.date' => 'Informe uma data de entrada válida.',
        ];
    }
}