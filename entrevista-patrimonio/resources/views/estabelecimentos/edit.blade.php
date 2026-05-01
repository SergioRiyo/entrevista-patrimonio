@extends('layouts.app')

@section('title', 'Editar Estabelecimento')

@section('content')
    <h2>Editar Estabelecimento</h2>

    <form action="{{ route('estabelecimentos.update', $estabelecimento) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label for="tipo_estabelecimento_id">Tipo de Estabelecimento:</label><br>
            <select id="tipo_estabelecimento_id" name="tipo_estabelecimento_id">
                <option value="">Selecione</option>

                @foreach ($tipos as $tipo)
                    <option
                        value="{{ $tipo->id }}"
                        @selected(old('tipo_estabelecimento_id', $estabelecimento->tipo_estabelecimento_id) == $tipo->id)
                    >
                        {{ $tipo->nome }}
                    </option>
                @endforeach
            </select>

            @error('tipo_estabelecimento_id')
                <br>
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </p>

        <p>
            <label for="nome">Nome:</label><br>
            <input
                type="text"
                id="nome"
                name="nome"
                value="{{ old('nome', $estabelecimento->nome) }}"
            >

            @error('nome')
                <br>
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </p>

        <p>
            <label for="cnpj">CNPJ:</label><br>
            <input
                type="text"
                id="cnpj"
                name="cnpj"
                value="{{ old('cnpj', $estabelecimento->cnpj) }}"
                placeholder="Somente números"
            >

            @error('cnpj')
                <br>
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </p>

        <p>
            <label for="prazo_maximo_emprestimo_dias">Prazo Máximo de Empréstimo em Dias:</label><br>
            <input
                type="number"
                id="prazo_maximo_emprestimo_dias"
                name="prazo_maximo_emprestimo_dias"
                value="{{ old('prazo_maximo_emprestimo_dias', $estabelecimento->prazo_maximo_emprestimo_dias) }}"
                min="1"
            >

            @error('prazo_maximo_emprestimo_dias')
                <br>
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </p>

        <button type="submit">Atualizar</button>
        <a href="{{ route('estabelecimentos.index') }}">Voltar</a>
    </form>
@endsection