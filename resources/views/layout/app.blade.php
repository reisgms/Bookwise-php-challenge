<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />


    @vite(['resources/css/app.css'])
</head>

<body>
    <header class="border-bottom">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <strong>BookWise</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#textoNavbar"
                    aria-controls="textoNavbar" aria-expanded="false" aria-label="Alterna navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="textoNavbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('books.index') }}">Home</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('books.my') }}">Meus Livros</a>
                            </li>
                        @endauth
                    </ul>
                    <span class="navbar-text">
                        @auth()
                            <a href="{{ route('logout') }}">Sair</a>
                        @else
                            <a href="{{ route('login') }}">Entrar</a>
                        @endauth
                    </span>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    @stack('modals')

    @vite(['resources/js/app.js'])
</body>

</html>
