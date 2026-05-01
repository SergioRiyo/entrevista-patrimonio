<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaixarPatrimonioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'data_baixa' => ['required', 'date'],
            'motivo_baixa' => ['required', 'string', 'min:5'],
        ];
    }

    public function messages(): array
    {
        return [
            'data_baixa.required' => 'Informe a data da baixa.',
            'data_baixa.date' => 'Informe uma data de baixa válida.',
            'motivo_baixa.required' => 'Informe o motivo da baixa.',
            'motivo_baixa.min' => 'O motivo da baixa deve ter pelo menos 5 caracteres.',
        ];
    }
}