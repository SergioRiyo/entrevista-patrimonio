@extends('layouts.app')

@section('title', 'Novo Empréstimo')

@section('content')
    <h2>Novo Empréstimo</h2>

    <p>
        O empréstimo só será permitido entre estabelecimentos do mesmo tipo.
        Patrimônios baixados ou pertencentes a outro estabelecimento serão bloqueados pelo sistema.
    </p>

    <form action="{{ route('emprestimos.store') }}" method="POST">
        @csrf

        <p>
            <label for="estabelecimento_requerente_id">Estabelecimento Requerente:</label><br>
            <select id="estabelecimento_requerente_id" name="estabelecimento_requerente_id">
                <option value="">Selecione</option>

                @foreach ($estabelecimentos as $estabelecimento)
                    <option
                        value="{{ $estabelecimento->id }}"
                        @selected(old('estabelecimento_requerente_id') == $estabelecimento->id)
                    >
                        {{ $estabelecimento->nome }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label for="estabelecimento_atendente_id">Estabelecimento Atendente:</label><br>
            <select id="estabelecimento_atendente_id" name="estabelecimento_atendente_id">
                <option value="">Selecione</option>

                @foreach ($estabelecimentos as $estabelecimento)
                    <option
                        value="{{ $estabelecimento->id }}"
                        @selected(old('estabelecimento_atendente_id') == $estabelecimento->id)
                    >
                        {{ $estabelecimento->nome }}
                    </option>
                @endforeach
            </select>
        </p>

        <hr>

        <h3>Patrimônio do Empréstimo</h3>

        <p>
            <label for="patrimonio_id">Patrimônio:</label><br>
            <select id="patrimonio_id" name="itens[0][patrimonio_id]">
                <option value="">Selecione</option>

                @foreach ($patrimonios as $patrimonio)
                    @if (! $patrimonio->estaBaixado())
                        <option
                            value="{{ $patrimonio->id }}"
                            @selected(old('itens.0.patrimonio_id') == $patrimonio->id)
                        >
                            {{ $patrimonio->nome }}
                            -
                            {{ $patrimonio->codigo }}
                            -
                            {{ $patrimonio->estabelecimentoPai->nome ?? 'Sem estabelecimento' }}
                        </option>
                    @endif
                @endforeach
            </select>
        </p>

        <p>
            <label for="data_emprestimo">Data de Empréstimo:</label><br>
            <input
                type="date"
                id="data_emprestimo"
                name="itens[0][data_emprestimo]"
                value="{{ old('itens.0.data_emprestimo') }}"
            >
        </p>

        <p>
            <label for="data_devolucao">Data de Devolução:</label><br>
            <input
                type="date"
                id="data_devolucao"
                name="itens[0][data_devolucao]"
                value="{{ old('itens.0.data_devolucao') }}"
            >
        </p>

        <button type="submit">Salvar Empréstimo</button>
        <a href="{{ route('emprestimos.index') }}">Voltar</a>
    </form>
@endsection