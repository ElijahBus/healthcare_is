<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HIT') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    {{-- Charts --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('js/apexcharts/dist/apexcharts.css') }}">

    @isset($chartsData)
        <script type="text/javascript">
            window.__CHARTS_DATA__ = "{!! addslashes(json_encode($chartsData)) !!}"
        </script>
    @endisset
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-bg shadow shadow-lg">
            <div class="container nav-container">
                <b class="navbar-brand text-white selected-menu" >
                    @isset($title)
                        {{ $title }}
                    @endisset
                </b>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <div>
                                <div class="form-group form-inline">
                                    <i class="fas fa-mail-bulk    "></i>

                                    {{-- Search field --}}
                                    <form action="{{ route('patient.search') }}" method="post" class="d-flex">
                                        @csrf
                                        <input type="text" name="patient_id" id="search" class="form-control bg-light search mr-1" placeholder="Patient ID">
                                        <input type="submit" value="Search" class="btn btn-outline-primary mr-4">
                                    </form>

                                    {{-- Logged in user drop down --}}
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white h6" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                                </div>
                            </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>


    {{-- Font awesome cdn --}}
    <script src="https://use.fontawesome.com/c090d56357.js"></script>

    {{-- Custom js --}}
    <script src="{{ asset('js/helper.js') }}"></script>

    {{-- Charts  --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/apexcharts/dist/apexcharts.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
