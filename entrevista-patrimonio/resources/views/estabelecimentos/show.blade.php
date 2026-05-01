@extends('layouts.app')

@section('title', 'Detalhes do Estabelecimento')

@section('content')

    <h2>Detalhes do estabelecimento</h2>

    <p>
        <strong>ID:</strong>
        {{ $estabelecimento->id }}
    </p>

    <p>
        <strong>Nome:</strong>
        {{ $estabelecimento->nome }}
    </p>

    <p>
        <strong>CNPJ:</strong>
        {{ $estabelecimento->cnpj }}
    </p>

    <p>
        <strong>Tipo:</strong>
        {{ $estabelecimento->tipoEstabelecimento->nome }}
    </p>

    <p>
        <strong>Prazo de Emprestimo:</strong>
        @if ($estabelecimento->prazo_maximo_emprestimo_dias)
            {{ $estabelecimento->prazo_maximo_emprestimo_dias }} dias
        @else
            não definido
        @endif
    </p>

    <p>
        <strong>Criado em:</strong>
        {{ $estabelecimento->created_at->format('d/m/Y H:i') }}
    </p>

    <p>
        <strong>Atualizado em:</strong>
        {{ $estabelecimento->updated_at->format('d/m/Y H:i') }}
    </p>

    <a href="{{ route('estabelecimentos.edit', $estabelecimento) }}">Editar</a>
    <a href="{{ route('estabelecimentos.index', $estabelecimento) }}">Voltar</a>
@endsection
