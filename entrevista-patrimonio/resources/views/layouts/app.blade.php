<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistema de Patrimônios')</title>
</head>
<body>
    <h1>Sistema de Empréstimos de Patrimônios</h1>

    <nav>
        <a href="{{ route('tipo-estabelecimentos.index') }}">Tipos</a> |
        <a href="{{ route('estabelecimentos.index') }}">Estabelecimentos</a> |
        <a href="{{ route('patrimonios.index') }}">Patrimônios</a> |
        <a href="{{ route('emprestimos.index') }}">Empréstimos</a>
    </nav>

    <hr>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <strong>Erros encontrados:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</body>
</html>