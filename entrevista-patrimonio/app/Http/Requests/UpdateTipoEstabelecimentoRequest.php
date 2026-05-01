<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTipoEstabelecimentoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $tipoId = $this->route('tipo_estabelecimento')?->id
            ?? $this->route('tipo_estabelecimento');

        return [
            'nome' => [
                'required',
                'string',
                'max:255',
                Rule::unique('tipo_estabelecimentos', 'nome')->ignore($tipoId),
            ],
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