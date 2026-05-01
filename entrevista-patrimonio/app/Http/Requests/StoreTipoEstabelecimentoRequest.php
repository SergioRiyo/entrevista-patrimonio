<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTipoEstabelecimentoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:255', 'unique:tipo_estabelecimentos,nome'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'Informe o nome do tipo de estabelecimento.',
            'nome.unique' => 'Já existe um tipo de estabelecimento com este nome.',
        ];
    }
}