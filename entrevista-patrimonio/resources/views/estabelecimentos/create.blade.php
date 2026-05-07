@extends('layouts.app')

@section('title', 'Novo Estabelecimento')

@section('content')
    <h2>Novo Estabelecimento</h2>

    <form action="{{ route('estabelecimentos.store') }}" method="POST">
        @csrf

        <p>
            <label for="tipo_estabelecimento_id">Tipo de Estabelecimento:</label><br>
            <select id="tipo_estabelecimento_id" name="tipo_estabelecimento_id">
                <option value="">Selecione</option>

                @foreach ($tipos as $tipo)
                    <option
                        value="{{ $tipo->id }}"
                        @selected(old('tipo_estabelecimento_id') == $tipo->id)
                    >
                        {{ $tipo->nome }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label for="nome">Nome:</label><br>
            <input
                type="text"
                id="nome"
                name="nome"
                value="{{ old('nome') }}"
            >
        </p>

        <p>
            <label for="cnpj">CNPJ:</label><br>
            <input
                type="text"
                id="cnpj"
                name="cnpj"
                value="{{ old('cnpj') }}"
                placeholder="Somente números"
            >
        </p>

        <p>
            <label for="prazo_maximo_emprestimo_dias">Prazo de empréstimo em dias:</label><br>
            <input
                type="number"
                id="prazo_maximo_emprestimo_dias"
                name="prazo_maximo_emprestimo_dias"
                value="{{ old('prazo_maximo_emprestimo_dias') }}"
                min="1"
            >
        </p>

        <button type="submit">Salvar</button>
        <a href="{{ route('estabelecimentos.index') }}">Voltar</a>
    </form>
@endsection