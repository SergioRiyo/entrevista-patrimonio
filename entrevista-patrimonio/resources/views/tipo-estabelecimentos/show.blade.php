@extends('layouts.app')

@section('title', 'Detalhes do Tipo de Estabelecimento')

@section('content')
    <h2>Detalhes do Tipo de Estabelecimento</h2>

    <p>
        <strong>ID:</strong>
        {{ $tipoEstabelecimento->id }}
    </p>

    <p>
        <strong>Nome:</strong>
        {{ $tipoEstabelecimento->nome }}
    </p>

    <p>
        <strong>Criado em:</strong>
        {{ $tipoEstabelecimento->created_at->format('d/m/Y H:i') }}
    </p>

    <p>
        <strong>Atualizado em:</strong>
        {{ $tipoEstabelecimento->updated_at->format('d/m/Y H:i') }}
    </p>

    <a href="{{ route('tipo-estabelecimentos.edit', $tipoEstabelecimento) }}">Editar</a>
    <a href="{{ route('tipo-estabelecimentos.index') }}">Voltar</a>
@endsection