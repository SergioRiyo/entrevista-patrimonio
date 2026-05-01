@extends('layouts.app')

@section('title', 'Detalhes do Patrimônio')

@section('content')
    <h2>Detalhes do Patrimônio</h2>

    <p><strong>ID:</strong> {{ $patrimonio->id }}</p>
    <p><strong>Nome:</strong> {{ $patrimonio->nome }}</p>
    <p><strong>Código:</strong> {{ $patrimonio->codigo }}</p>
    <p><strong>Tipo:</strong> {{ ucfirst($patrimonio->tipo) }}</p>
    <p><strong>Estabelecimento Pai:</strong> {{ $patrimonio->estabelecimentoPai->nome ?? '-' }}</p>
    <p><strong>Data de Entrada:</strong> {{ $patrimonio->data_entrada?->format('d/m/Y') }}</p>

    <p>
        <strong>Status:</strong>
        @if ($patrimonio->estaBaixado())
            Baixado
        @else
            Ativo
        @endif
    </p>

    @if ($patrimonio->estaBaixado())
        <p><strong>Data da Baixa:</strong> {{ $patrimonio->data_baixa?->format('d/m/Y') }}</p>
        <p><strong>Motivo da Baixa:</strong> {{ $patrimonio->motivo_baixa }}</p>
    @else
        <hr>

        <h3>Baixar Patrimônio</h3>

        <form action="{{ route('patrimonios.baixar', $patrimonio) }}" method="POST">
            @csrf
            @method('PATCH')

            <p>
                <label for="data_baixa">Data da Baixa:</label><br>
                <input type="date" id="data_baixa" name="data_baixa" value="{{ old('data_baixa') }}">
            </p>

            <p>
                <label for="motivo_baixa">Motivo da Baixa:</label><br>
                <textarea id="motivo_baixa" name="motivo_baixa">{{ old('motivo_baixa') }}</textarea>
            </p>

            <button type="submit" onclick="return confirm('Deseja baixar este patrimônio?')">
                Baixar Patrimônio
            </button>
        </form>
    @endif

    <hr>

    <a href="{{ route('patrimonios.edit', $patrimonio) }}">Editar</a>
    <a href="{{ route('patrimonios.index') }}">Voltar</a>
@endsection