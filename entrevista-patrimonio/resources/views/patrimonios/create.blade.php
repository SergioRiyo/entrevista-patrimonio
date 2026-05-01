@extends('layouts.app')

@section('title', 'Novo Patrimônio')

@section('content')
    <h2>Novo Patrimônio</h2>

    <form action="{{ route('patrimonios.store') }}" method="POST">
        @csrf

        <p>
            <label for="estabelecimento_pai_id">Estabelecimento Dono:</label><br>
            <select id="estabelecimento_pai_id" name="estabelecimento_pai_id">
                <option value="">Selecione</option>

                @foreach ($estabelecimentos as $estabelecimento)
                    <option
                        value="{{ $estabelecimento->id }}"
                        @selected(old('estabelecimento_pai_id') == $estabelecimento->id)
                    >
                        {{ $estabelecimento->nome }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label for="nome">Nome:</label><br>
            <input type="text" id="nome" name="nome" value="{{ old('nome') }}">
        </p>

        <p>
            <label for="codigo">Código:</label><br>
            <input type="text" id="codigo" name="codigo" value="{{ old('codigo') }}">
        </p>

        <p>
            <label for="tipo">Tipo:</label><br>
            <select id="tipo" name="tipo">
                <option value="">Selecione</option>
                <option value="proprio" @selected(old('tipo') === 'proprio')>Próprio</option>
                <option value="alugado" @selected(old('tipo') === 'alugado')>Alugado</option>
                <option value="emprestado" @selected(old('tipo') === 'emprestado')>Emprestado</option>
            </select>
        </p>

        <p>
            <label for="data_entrada">Data de Entrada:</label><br>
            <input type="date" id="data_entrada" name="data_entrada" value="{{ old('data_entrada') }}">
        </p>

        <button type="submit">Salvar</button>
        <a href="{{ route('patrimonios.index') }}">Voltar</a>
    </form>
@endsection