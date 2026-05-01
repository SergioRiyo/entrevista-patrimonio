@extends('layouts.app')

@section('title', 'Detalhes do Empréstimo')

@section('content')
    <h2>Detalhes do Empréstimo</h2>

    <p>
        <strong>ID:</strong>
        {{ $emprestimo->id }}
    </p>

    <p>
        <strong>Estabelecimento Requerente:</strong>
        {{ $emprestimo->estabelecimentoRequerente->nome ?? '-' }}
    </p>

    <p>
        <strong>CNPJ do Requerente:</strong>
        {{ $emprestimo->estabelecimentoRequerente->cnpj ?? '-' }}
    </p>

    <p>
        <strong>Estabelecimento Atendente:</strong>
        {{ $emprestimo->estabelecimentoAtendente->nome ?? '-' }}
    </p>

    <p>
        <strong>CNPJ do Atendente:</strong>
        {{ $emprestimo->estabelecimentoAtendente->cnpj ?? '-' }}
    </p>

    <p>
        <strong>Status:</strong>
        {{ ucfirst($emprestimo->status) }}
    </p>

    <hr>

    <h3>Patrimônios Emprestados</h3>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Patrimônio</th>
                <th>Código</th>
                <th>Tipo</th>
                <th>Data de Empréstimo</th>
                <th>Data de Devolução</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($emprestimo->itens as $item)
                <tr>
                    <td>{{ $item->patrimonio->nome ?? '-' }}</td>
                    <td>{{ $item->patrimonio->codigo ?? '-' }}</td>
                    <td>{{ ucfirst($item->patrimonio->tipo ?? '-') }}</td>
                    <td>{{ $item->data_emprestimo?->format('d/m/Y') }}</td>
                    <td>{{ $item->data_devolucao?->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>
        <a href="{{ route('emprestimos.index') }}">Voltar</a>
    </p>
@endsection