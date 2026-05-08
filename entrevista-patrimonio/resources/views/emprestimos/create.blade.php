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
                <option value="">Selecione um estabelecimento atendente</option>
                
                
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

    <script>
    const estabelecimentoAtendenteSelect = document.getElementById('estabelecimento_atendente_id');
    const patrimonioSelect = document.getElementById('patrimonio_id');

    estabelecimentoAtendenteSelect.addEventListener('change', function () {
        const estabelecimentoId = this.value;

        patrimonioSelect.innerHTML = '<option value="">Carregando patrimônios...</option>';

        if (!estabelecimentoId) {
            patrimonioSelect.innerHTML = '<option value="">Selecione um estabelecimento atendente</option>';
            return;
        }

        fetch(`/patrimonios/disponiveis/${estabelecimentoId}`)
            .then(response => response.json())
            .then(patrimonios => {
                patrimonioSelect.innerHTML = '<option value="">Selecione</option>';

                if (patrimonios.length === 0) {
                    patrimonioSelect.innerHTML = '<option value="">Nenhum patrimônio disponível</option>';
                    return;
                }

                patrimonios.forEach(patrimonio => {
                    const option = document.createElement('option');

                    option.value = patrimonio.id;
                    option.textContent = `${patrimonio.nome} - ${patrimonio.codigo}`;

                    patrimonioSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Erro ao buscar patrimônios:', error);

                patrimonioSelect.innerHTML = '<option value="">Erro ao carregar patrimônios</option>';
            });
    });
</script>

@endsection