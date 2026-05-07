@extends('layouts.app')

@section('title', 'Estabelecimentos')


@section('content')
    <h2>Estabelecimentos</h2>
    <p>
        <div class="page-actions">
            <a class="button" href="{{ route('estabelecimentos.create') }}">
                Novo estabelecimento
            </a>
        </div>
    </p>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>cnpj</th>
                <th>Tipo</th>
                <th>Prazo Máximo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($estabelecimentos as $estabelecimento)
                <tr>
                    <td>{{ $estabelecimento->id }}</td>
                    <td>{{ $estabelecimento->nome }}</td>
                    <td>{{ $estabelecimento->cnpj }}</td>
                    <td>{{ $estabelecimento->tipoEstabelecimento->nome }}</td>
                    <td>
                        @if ($estabelecimento->prazo_maximo_emprestimo_dias)
                            {{ $estabelecimento->prazo_maximo_emprestimo_dias }} dias
                        @else
                            Não definido
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('estabelecimentos.show', $estabelecimento) }}">Ver</a>
                        <a href="{{ route('estabelecimentos.edit', $estabelecimento) }}">Editar</a>
                        <form action="{{ route('estabelecimentos.destroy', $estabelecimento) }}" method="POST"
                            style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button class="danger" type="submit" onclick="return confirm('Deseja excluir este estabelecimento?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Nenhum estabelecimento cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div>
        {{ $estabelecimentos->links() }}
    </div>
@endsection
