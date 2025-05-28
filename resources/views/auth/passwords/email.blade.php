{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Recupera Contraseña | Jornada RADLA-CIDERM Trujillo</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}"/>
    <link href="{{asset('layouts/vertical-light-menu/css/light/loader.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('layouts/vertical-light-menu/css/dark/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('layouts/vertical-light-menu/loader.js')}}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100;0,9..40,400;0,9..40,500;0,9..40,700;1,9..40,100;1,9..40,400;1,9..40,500;1,9..40,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('layouts/vertical-light-menu/css/light/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/light/authentication/auth-cover.css')}}" rel="stylesheet" type="text/css" />
    
    <link href="{{asset('layouts/vertical-light-menu/css/dark/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/dark/authentication/auth-cover.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
</head>
<body class="form">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <div class="auth-container d-flex">

        <div class="container mx-auto align-self-center">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="row">
                    <div class="col-6 d-lg-flex d-none h-100 my-auto top-0 start-0 text-center justify-content-center flex-column">
                        <div class="auth-cover-bg-image"></div>
                        <div class="auth-overlay" style="background-image: url({{asset('assets/img/bg-lg-1-min.jpg')}});background-size: cover;"></div>
                        <div class="auth-cover">
                            <div class="position-relative">
                                <h2 class="mt-5 text-white px-2" style="font-weight: bold;">{{__('JORNADA DESCENTRALIZADA RADLA - SOCIEDAD MÉDICA CÍRCULO DERMATOLÓGICO DEL PERÚ 2025')}}</h2>
                                <p class="text-white">{{ __('Hotel Costa del Sol, Golf Trujillo - Sábado 11 de octubre de 2025') }}</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center ms-lg-auto me-lg-0 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <div class="text-end mb-3">
                                            <a href="locale/es" class="" ><span class="badge {{ (app()->getLocale() == 'es') ? 'badge-light-primary' : 'badge-light-dark' }}">ES</span></span></a>
                                            <a href="locale/en" class="" ><span class="badge {{ (app()->getLocale() == 'en') ? 'badge-light-primary' : 'badge-light-dark' }}">EN</span></span></a>
                                        </div>
                                        <h2 class="text-center">{{ __('Recuperar Contraseña') }}</h2>
                                        <p class="text-center">{{ __('Ingrese su correo electrónico con el que se registró en nuestra plataforma para recuperar su contraseña.') }}</p>
                                    </div>
                                    <div class="col-md-12">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif

                                        <div class="mb-3">
                                            <input id="email" type="email" class="form-control text-center @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-12">
                                        <div class="mb-4">

                                            <button type="submit" class="btn btn-secondary w-100">
                                                {{ __('Enviar enlace para restablecer contraseña') }}
                                            </button>

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->


</body>
</html>

{{-- @endsection --}}