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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="manifest" href="/manifest.json">

    <!-- Customs -->
    <link href="{{ asset('css/mobile.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style type="text/css">
        .offcanvas-start{
            width: 264px !important;
        }
        .offcanvas-end{
            width: 264px !important;
        }
        .nav-bottom .nav-link:hover {
            color: #ffbf00;
        }
        .nav-bottom .nav-link:focus {
            color: #ffbf00;
        }
        .nav-bottom .nav-link.active {
            color: #ffbf00;
        }
        .nav-bottom .nav-link.active .text {
            color: #ffbf00;
        }
    </style>

</head>
<body>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">
            {{-- <svg class="bi me-2" width="40" height="32"> <use xlink:href="#bootstrap"></use></svg> --}}
            {{ config('app.name', 'Laravel') }}
            </h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body p-0">

            {{-- <div class="d-flex flex-column flex-shrink-0 p-3 bg-light">
                <!-- <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                    <span class="fs-4">Sidebar</span>
                </a> -->

                <!-- <hr> -->
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link active" aria-current="page">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{route('familytree')}}" class="nav-link link-dark">
                            <i class="fas fa-sitemap" aria-hidden="true"></i>
                            FamilyTree
                        </a>
                    </li>
                    <li>
                        <a href="{{route('firebase')}}" class="nav-link link-dark">
                            <i class="fa fa-fire" aria-hidden="true"></i>
                            Firebase
                        </a>
                    </li>
                    <li>
                        <a href="{{route('bootstrap')}}" class="nav-link link-dark">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            Bootstrap 5
                        </a>
                    </li>
                    <li>
                        <a href="{{route('setting')}}" class="nav-link link-dark">
                            <i class="fa fa-lg fa-cog" aria-hidden="true"></i>
                            Settings
                        </a>
                    </li>
                </ul>
            </div> --}}
            <nav class="nav-list">
                <a class="btn-list text-decoration-none" href="#">
                    <i class="icon-control fa fa-chevron-right"></i>
                    <span class="text">Simple menu</span>
                </a>
                <a class="btn-list text-decoration-none" href="#">
                    <i class="icon-control fa fa-chevron-right"></i>
                    <span class="text">Simple menu</span>
                </a>
                <a class="btn-list text-decoration-none" href="#">
                    <i class="icon-control fa fa-chevron-right"></i>
                    <span class="text">Simple menu</span>
                </a>
            </nav>
        </div>
    </div>
    
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  bg-white bg-gradient">
            <div class="container col-md-10">
                <button class="btn btn-icon border-0" id="dropdownUser" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft"><i class="fas fa-lg fa-bars" aria-hidden="true"></i></button>
                <div class="col" id="navbarNav">
                    @yield('title')
                </div>
                
                <div class="d-flex">
                    <div class="flex-shrink-0 dropdown">
                        <a href="#" class="d-block  text-decoration-none dropdown-toggle text-black" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="true">
                            <img src="https://github.com/mdo.png" alt="mdo" width="29" height="29" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" data-popper-placement="bottom-end" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(-110px, 34px, 0px);">
                            <li><a class="dropdown-item btn-light text-gray-500" href="#">New project...</a></li>
                            <li><a class="dropdown-item btn-light text-gray-500" href="#">Settings</a></li>
                            <li><a class="dropdown-item btn-light text-gray-500" href="{{url('agent\profile')}}">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item"  href="{{ route('agent.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                            </li>

                            <form id="logout-form" action="{{ route('agent.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
    
                </div>
            </div>
        </nav>
        <nav class="nav-bottom rounded-0">
            <a href="#" class="nav-link active">
                <i class="icon fa fa-star"></i><span class="text">Home</span>
            </a>

            <a href="#" class="nav-link">
                <i class="icon fa fa-star"></i><span class="text">Sales</span>
            </a>

            <a href="#" class="nav-link">
                <i class="icon fa fa-star"></i><span class="text">Products</span>
            </a>

            <a href="#" class="nav-link">
                <i class="icon fa fa-star"></i><span class="text">Settings</span>
            </a>

        </nav> <!-- nav-bottom -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    
    @stack('scripts')

</body>
</html>
