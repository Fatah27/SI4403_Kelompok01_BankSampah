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

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        html {
            height: 100%;
        }
        body {
            min-height: 100%;
        }
        .bgs{
            background-color: #276561;
        }
    </style>
</head>
<body>

<div class="row justify-content-center h-100">
    <div class="col-6 hidden-md-down p-5 bg-white" id="yellow">
        <h1 style="margin-bottom: 70px">Bank Sampah</h1>
        <img class="img-fluid w-50 d-block mx-auto mb-5" src="{{asset('/image/img.png')}}" alt="">
        <h1 class="fw-bold text-center" style="color: #276561;font-size: xxx-large"> Starts for free and get <br>attractive offers</h1>
    </div>
    <div class="col-6 bgs p-5 " style="height: 100vh">
        <h1 class="fw-bold text-white mb-2" style="margin-top: 70px">Log in.</h1>
        <p class="text-white fs-5 fw-lighter">Doesn't Have an Account? <a href="{{route('register')}}" class="fw-bold text-white text-decoration-none">Log In</a></p>
        <hr class="text-white">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="row mb-3">
                <div class="">
                    <input id="email" type="email" placeholder="Email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="">
                    <input id="password" type="password" placeholder="Password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="">
                    <div class="form-check">
                        <input class="form-check-input from" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label text-white" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="row mb-0">
                <div class="">
                    <button type="submit" class="btn btn-lg w-100 bg-white fw-bold">
                        {{ __('Login') }}
                    </button>

                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>


</body>
</html>
