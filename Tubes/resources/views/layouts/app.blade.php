<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .bgs{
            background-color: #276561;
        }

        #fixedbutton {
            position: fixed;
            font-size: 50px;
            color: white;
            border-radius: 50%;
            width: 100px;
            bottom: 100px;
            right: 100px;
        }

        #fixedbutton:hover{
          background-color: #0f5132;
        }
    </style>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body class="bg-white">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bgs shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   Bank Sampah
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <ul class="navbar-nav me-auto">

                        @guest

                                @else
                            <li class="nav-item m-2 fw-bold" style="margin-right: 50px !important;">
                                <a class="text-white fw-bold text-decoration-none" href="{{route('index')}}">Home</a>
                            </li>

                            <li class="nav-item m-2 fw-bold" style="margin-right: 50px !important;">
                                <a class="text-white fw-bold text-decoration-none" href="{{route('warehouse.index')}}">My Warehouse</a>
                            </li>

                            <li class="nav-item m-2 fw-bold" style="margin-right: 50px !important;">
                                <a class="text-white fw-bold text-decoration-none" href="{{route('order.index')}}">Order</a>
                            </li>

                            <li class="nav-item m-2 fw-bold" style="margin-right: 50px !important;">
                                <a class="text-white fw-bold text-decoration-none" href="{{route('shop.index')}}">Shop</a>
                            </li>

                                @endguest

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item m-2 fw-bold">
                                    <a class="btn bg-white fw-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item m-2 fw-bold">
                                    <a class="btn bg-white fw-bold" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{route('detail')}}">
                                        Profile
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
@stack('scripts')

</body>


</html>
