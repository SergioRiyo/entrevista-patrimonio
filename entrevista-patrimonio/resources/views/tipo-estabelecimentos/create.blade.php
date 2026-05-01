@extends('layouts.app')

@section('title', 'Novo Tipo de Estabelecimento')

@section('content')
    <h2>Novo Tipo de Estabelecimento</h2>

    <form action="{{ route('tipo-estabelecimentos.store') }}" method="POST">
        @csrf

        <p>
            <label for="nome">Nome:</label><br>
            <input type="text" id="nome" name="nome" value="{{ old('nome') }}">

            @error('nome')
                <br>
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </p>

        <button type="submit">Salvar</button>
        <a href="{{ route('tipo-estabelecimentos.index') }}">Voltar</a>
    </form>
@endsection