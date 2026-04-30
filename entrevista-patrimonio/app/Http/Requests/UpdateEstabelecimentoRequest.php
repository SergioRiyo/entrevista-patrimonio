<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEstabelecimentoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $estabelecimentoId = $this->route('estabelecimento')?->id ?? $this->route('estabelecimento');

        return [
            'tipo_estabelecimento_id' => ['required', 'exists:tipo_estabelecimentos,id'],
            'nome' => ['required', 'string', 'max:255'],
            'cnpj' => [
                'required',
                'digits:14',
                Rule::unique('estabelecimentos', 'cnpj')->ignore($estabelecimentoId),
            ],
            'prazo_maximo_emprestimo_dias' => ['nullable', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'tipo_estabelecimento_id.required' => 'Informe o tipo do estabelecimento.',
            'tipo_estabelecimento_id.exists' => 'O tipo de estabelecimento informado não existe.',
            'nome.required' => 'Informe o nome do estabelecimento.',
            'cnpj.required' => 'Informe o CNPJ.',
            'cnpj.digits' => 'O CNPJ deve conter exatamente 14 números.',
            'cnpj.unique' => 'Já existe um estabelecimento com este CNPJ.',
            'prazo_maximo_emprestimo_dias.integer' => 'O prazo máximo deve ser um número inteiro.',
            'prazo_maximo_emprestimo_dias.min' => 'O prazo máximo deve ser maior que zero.',
        ];
    }
}