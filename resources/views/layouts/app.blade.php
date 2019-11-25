<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <!--<script src="{{ asset('js/app.js') }}"></script>-->
    <script src="{{ asset('js/owl.carousel.js') }}" defer></script>
    <!-- Fonts -->
    <!--<link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">-->

    <!-- Styles -->
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mycss.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar fixed-top navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <ul class="navbar-nav ml-auto">
                    <!--<a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Grial Wines') }}
                </a>-->
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                </ul>

                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('Vinos')}}">Vinos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('extras')}}">Extras</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Explora el mundo del vino</a>
                        </li>
                        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Más
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Viñedos</a>
          <a class="dropdown-item" href="#">Extras</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Contacto</a>
        </div>
      </li>
                    </ul>
                    <ul class="navbar-nav m-auto">
                        <a href="{{url('/')}}"><img src="{{asset('logo.png')}}" style="position: absolute;margin-left: -10vh" width="130px" alt=""></a>
                    </ul>
                    
                    <div class="section content">
                            <cart-dropdown></cart-dropdown>
                    </div>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if($cont!=null)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('incart') }}">Carro {{$cont}}</a>
                            </li>
                        @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Ingresar</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrate</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('incart')}}">Carro</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>

            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
