<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/mobile.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="manifest" href="/manifest.json">

    @livewireStyles

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        .offcanvas-start{
            width: 264px !important;
        }
        .offcanvas-end{
            width: 264px !important;
        }
        .nav-link{
            color: #212529 !important;
        }
    </style>
    @stack('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-white shadow-sm">
            <div class="container col-md-8">
                <a class="navbar-brand float-center" href="{{ url('/home') }}">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <div class="d-flex">
                    <a href="#" class="d-block link-dark text-decoration" id="dropdownUser1"data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <i class="fas fa-lg fa-shopping-cart position-relative" aria-hidden="true">
                            <span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-1"><span class="visually-hidden">1</span></span>
                        </i>
                        {{-- <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle"> --}}
                    </a>
                </div>
            </div>
        </nav>
        <main class="py-4 mt-5">
            <div class="mb-3" id="mapholder"></div>
            @yield('content')
        </main>
    </div>
    
    <script src="{{asset('js/main.js')}}"></script>

    @livewireScripts

    @stack('scripts')

</body>
</html>
