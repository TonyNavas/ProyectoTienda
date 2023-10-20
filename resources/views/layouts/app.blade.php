<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @livewireStyles

    <!-- Scripts -->
    <script src="https://js.stripe.com/v3/"></script>

    @isset($css)
        {{ $css }}
    @endisset
</head>

<body>
    <div id="app">
        <nav style="z-index: 1; position: fixed; right: 0; left: 0;"
            class=" navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/inicio') }}">
                    <b>NIXELART</b>
                </a>

                <div class="d-lg-none d-sm-block">
                    @livewire('search')
                </div>



                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                        @auth
                        @if (auth()->user()->tienda)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">
                                <i class="fa-solid fa-user"></i>
                                Perfil y tienda
                            </a>
                        </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('categorias.index') }}">
                                    <i class="fa-solid fa-sitemap"></i>
                                    Categorias
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('product.index') }}">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                    Productos
                                </a>
                            </li>
                            @endif
                        @endauth

                        {{-- Aqui se muestra la tienda del usuario solo si esta autenticado y posee una tienda --}}
                        @auth
                            <li class="nav-item">
                                @if (auth()->user()->tienda)
                                    <span>

                                        <a class="nav-link"
                                            href="{{ route('tienda.home', ['tienda' => Str::slug(auth()->user()->tienda->name)]) }}">
                                            <i class="fa-solid fa-store"></i>
                                            Mi tienda
                                        </a>
                                    </span>
                                @endif

                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                        <div class="d-sm-none d-lg-block ">
                            @livewire('search')
                        </div>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5">
            @yield('content')
        </main>
    </div>

    @livewireScripts

    @isset($js)
        {{ $js }}
    @endisset
</body>

</html>

<style>
            .cover-image {
            position: relative;
        }
        .overlay-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff; /* Color del texto sobre la imagen */
        }
    </style>
</style>
