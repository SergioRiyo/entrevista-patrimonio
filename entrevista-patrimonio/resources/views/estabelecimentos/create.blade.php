@extends('layouts.app')

@section('title', 'Novo Estabelecimento')

@section('content')
    <h2>Novo estabelecimento</h2>

    <form action="{{ route('estabelecimentos.store') }}" method="POST")>
        @csrf
        <p>
            <label for="tipo_estabelecimento_id">
                Tipo de Estabelecimento:</label><br>
            <select name="tipo_estabelecimento_id" id="tipo_estabelecimento_id">

                <option value="">Selecione</option>

                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo->id }}" @selected(old('tipo_estabelecimento_id') == $tipo->id)>
                        {{ $tipo->nome }}
                    </option>
                @endforeach
            </select>
            @error('tipo_estabelecimento_id')
                <br>
                <small style="color:red">{{ $message }}</small>
            @enderror
        </p>
        <p>
            <label for="nome">Nome:</label><br>
            <input type="text" id="nome" name="nome" value="{{ old('nome') }}"
                @error('nome')
                <br>
                <small style="color:red">{{ $message }}</small>
            @enderror
                </p>

        <p>
            <label for="cnpj">CNPJ:</label><br>
            <input type="text" id="cnpj" name="cnpj" value="{{ old('cnpj') }}" placeholder="cnpj">

            @error('cnpj')
                <br>
                <small style="color:red">{{ $message }}</small>)
            @enderror
        </p>

        <p>
            <label for="prazo_maximo_emprestimo_dias">Prazo de emprestimo em dias:</label>
            <input type="number" id="prazo_maximo_emprestimo_dias" name="prazo_maximo_emprestimo_dias"
                value="{{ old('prazo_maximo_emprestimo_dias') }}">

            @error('prazo_maximo_emprestimo_dias')
                <br>
                <small style="color:red">{{ $message }}</small>)
            @enderror
        </p>
        <button type="submit">Salvar</button>
        <a href="{{ route('estabelecimentos.index') }}">Voltar</a>
    </form>
