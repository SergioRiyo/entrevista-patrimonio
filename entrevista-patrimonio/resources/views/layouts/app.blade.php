<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistema de Patrimônios')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <div class="container">
            <h1>Sistema de Empréstimos de Patrimônios</h1>

            <nav>
                <a href="{{ route('tipo-estabelecimentos.index') }}">Tipos</a>
                <a href="{{ route('estabelecimentos.index') }}">Estabelecimentos</a>
                <a href="{{ route('patrimonios.index') }}">Patrimônios</a>
                <a href="{{ route('emprestimos.index') }}">Empréstimos</a>
            </nav>
        </div>
    </header>

    <div class="container">
        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error-box">
                <strong>Corrija os erros abaixo:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>