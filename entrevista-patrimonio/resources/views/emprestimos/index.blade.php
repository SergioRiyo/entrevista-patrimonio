@extends('layouts.app')

@section('title', 'Empréstimos')

@section('content')
    <h2>Empréstimos</h2>

    <p>
        <a href="{{ route('emprestimos.create') }}">Novo Empréstimo</a>
    </p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Requerente</th>
                <th>Atendente</th>
                <th>Status</th>
                <th>Criado em</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($emprestimos as $emprestimo)
                <tr>
                    <td>{{ $emprestimo->id }}</td>
                    <td>{{ $emprestimo->estabelecimentoRequerente->nome ?? '-' }}</td>
                    <td>{{ $emprestimo->estabelecimentoAtendente->nome ?? '-' }}</td>
                    <td>{{ ucfirst($emprestimo->status) }}</td>
                    <td>{{ $emprestimo->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('emprestimos.show', $emprestimo) }}">Ver</a>

                        <form
                            action="{{ route('emprestimos.destroy', $emprestimo) }}"
                            method="POST"
                            style="display: inline;"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit" onclick="return confirm('Deseja excluir este empréstimo?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Nenhum empréstimo cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 16px;">
        {{ $emprestimos->links() }}
    </div>
@endsection