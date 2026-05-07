@extends('layouts.app')

@section('title', 'Patrimônios')

@section('content')
    <h2>Patrimônios</h2>

    <p>
        <div class="page-actions">
            <a class="button" href="{{ route('patrimonios.create') }}">Novo Patrimônio</a>
        </div>
    </p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Código</th>
                <th>Tipo</th>
                <th>Estabelecimento Pai</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($patrimonios as $patrimonio)
                <tr>
                    <td>{{ $patrimonio->id }}</td>
                    <td>{{ $patrimonio->nome }}</td>
                    <td>{{ $patrimonio->codigo }}</td>
                    <td>{{ ($patrimonio->tipo) }}</td>
                    <td>{{ $patrimonio->estabelecimentoPai->nome ?? '-' }}</td>
                    <td>
                        @if ($patrimonio->estaBaixado())
                            Baixado
                        @else
                            Ativo
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('patrimonios.show', $patrimonio) }}">Ver</a>
                        <a href="{{ route('patrimonios.edit', $patrimonio) }}">Editar</a>

                        <form action="{{ route('patrimonios.destroy', $patrimonio) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')

                            <button class="danger" type="submit" onclick="return confirm('Deseja excluir este patrimônio?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Nenhum patrimônio cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div>
        {{ $patrimonios->links() }}
    </div>
@endsection
