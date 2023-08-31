{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body>
        {{ $slot }}
    </body>
</html> --}}

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Marites Voice Center') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/css/suneditor.min.css" rel="stylesheet">


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/suneditor.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/suneditor@latest/src/lang/en.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])



</head>
<body>

</div>
    <div id="app ">
        <nav id="header" class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background-size: cover; background-color: blue;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ url('/images/mvclogo.png') }}" alt="MVC" class="img-fluid" style="max-width: 60px; max-height: 60px;">
                
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" style="font-size: 1.3rem; font-weight: bold; color: #002E94"  href="{{ route('about') }}">{{ __('About') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" style="font-size: 1.3rem; font-weight: bold; color: #002E94"  href="{{ route('post.index') }}">{{ __('Home') }}</a>
                            </li>                            
                            <li class="nav-item">
                                <a class="nav-link" style="font-size: 1.3rem; font-weight: bold; color: #002E94"  href="{{ route('post.list_event') }}">{{ __('Events') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="font-size: 1.3rem; font-weight: bold; color: #002E94"  href="{{ route('post.list_announcements') }}">{{ __('Announcements') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="font-size: 1.3rem; font-weight: bold; color: #002E94"  href="{{ ('/mariteschat') }}">{{ __('Chat') }}</a>
                            </li>
                        @endguest

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" style="font-size: 1.3rem; font-weight: bold; color: #002E94"  href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" style="font-size: 1.3rem; font-weight: bold; color: #002E94"  href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.index') }}">
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('post.index') }}">
                                        {{ __('News') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('profile.index') }}">
                                        {{ __('Events') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('profile.index') }}">
                                        {{ __('Announcements') }}
                                    </a>
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

        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>
