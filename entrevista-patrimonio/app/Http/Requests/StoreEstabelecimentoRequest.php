<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEstabelecimentoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'tipo_estabelecimento_id' => ['required'],
        'nome' => ['required', 'string', 'max:255'],
        'cnpj' => ['required', 'digits:14'],
        'prazo_maximo_emprestimo_dias' => ['required','min:1','integer'],
        ];
    }

    public function messages(): array{
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
