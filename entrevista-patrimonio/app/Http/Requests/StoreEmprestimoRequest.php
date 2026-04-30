<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmprestimoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'estabelecimento_requerente_id' => ['required', 'exists:estabelecimentos,id'],
            'estabelecimento_atendente_id' => ['required', 'exists:estabelecimentos,id'],

            'itens' => ['required', 'array', 'min:1'],
            'itens.*.patrimonio_id' => ['required', 'exists:patrimonios,id'],
            'itens.*.data_emprestimo' => ['required', 'date'],
            'itens.*.data_devolucao' => ['required', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'estabelecimento_requerente_id.required' => 'Informe o estabelecimento requerente.',
            'estabelecimento_atendente_id.exists' => 'O estabelecimento atendente não existe.',
            'itens.required' => 'Informe ao menos um patrimônio para o empréstimo.',
            'itens.min' => 'Informe ao menos um patrimônio para o empréstimo.',
            'itens.*.patrimonio_id.required' => 'Informe o patrimônio.',
            'itens.*.data_emprestimo.required' => 'Informe a data de empréstimo.',
            'itens.*.data_devolucao.required' => 'Informe a data de devolução.',
        ];
    }
}