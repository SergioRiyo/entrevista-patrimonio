@extends('layouts.app')

@section('title', 'Tipos de Estabelecimento')

@section('content')
    <h2>Tipos de Estabelecimento</h2>

    <p>
        <a href="{{ route('tipo-estabelecimentos.create') }}">Novo Tipo de Estabelecimento</a>
    </p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Criado em</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($tipos as $tipo)
                <tr>
                    <td>{{ $tipo->id }}</td>
                    <td>{{ $tipo->nome }}</td>
                    <td>{{ $tipo->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('tipo-estabelecimentos.show', $tipo) }}">Ver</a>
                        <a href="{{ route('tipo-estabelecimentos.edit', $tipo) }}">Editar</a>

                        <form
                            action="{{ route('tipo-estabelecimentos.destroy', $tipo) }} "method="POST" style="display: inline;"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit" onclick="return confirm('Deseja excluir este tipo?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Nenhum tipo de estabelecimento cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 16px;">
        {{ $tipos->links() }}
    </div>
@endsection