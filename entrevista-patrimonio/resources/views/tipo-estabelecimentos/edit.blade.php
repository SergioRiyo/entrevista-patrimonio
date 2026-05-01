@extends('layouts.app')

@section('title', 'Editar Tipo de Estabelecimento')

@section('content')
    <h2>Editar Tipo de Estabelecimento</h2>

    <form action="{{ route('tipo-estabelecimentos.update', $tipoEstabelecimento) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label for="nome">Nome:</label><br>
            <input type="text" id="nome" name="nome" value="{{ old('nome', $tipoEstabelecimento->nome) }}">

            @error('nome')
                <br>
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </p>

        <button type="submit">Atualizar</button>
        <a href="{{ route('tipo-estabelecimentos.index') }}">Voltar</a>
    </form>
@endsection