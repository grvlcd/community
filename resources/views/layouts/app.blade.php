<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <style>
        textarea:focus,
        input:focus {
            outline: none;
        }

    </style>
</head>

<body>
    <div id="app">
        <nav class="bg-white shadow-sm navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                        <ul class="mr-auto navbar-nav">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('My Communities') }}
                                </a>
                                <div class="px-2 dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <div class="mb-2">
                                        <a class="mb-2 text-center text-white rounded dropdown-item bg-success"
                                            href="{{ route('communities.create') }}">
                                            {{ __('Create a community') }}
                                        </a>
                                        <a class="text-center text-white rounded dropdown-item bg-primary"
                                            href="{{ route('communities.index') }}">
                                            {{ __('Browse more community') }}
                                        </a>
                                    </div>
                                    @foreach (Auth::user()->communities as $community)
                                        <a class="dropdown-item" href="{{ route('communities.show', $community) }}">
                                            {{ $community->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="ml-auto navbar-nav">
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
                                <div id="navbarDropdown" class="chip nav-link" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    @if (isset(Auth::user()->image->path))
                                        <img class="border rounded-circle border-secondary"
                                            src="{{ asset('images/' . Auth::user()->image->path) }}"
                                            alt="{{ Auth::user()->name }}" width="24" height="24">
                                    @endif
                                    <a class="text-muted text-decoration-none dropdown-toggle" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                </div>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('community.manage') }}">
                                        {{ __('Manage Community') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

        @if (isset($errors) && $errors->any())
            @foreach ($errors->all() as $error)
                <div class="mx-auto text-center col-6 alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        @if (session()->has('success'))
            <div class="mx-auto text-center col-6 alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif

        <main>
            @yield('content')
        </main>
    </div>
</body>
<script src="{{ asset('js/main.js') }}"></script>

</html>
