<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href=" {{ asset('assets/vendors/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href=" {{ asset('assets/vendors/aos/aos.css')}}">
    <link rel="stylesheet" href=" {{ asset('assets/css/style.css')}}">
    <script src=" {{ asset('assets/vendors/jquery/jquery.min.js')}}"></script>
    <script src=" {{ asset('assets/js/loader.js')}}"></script>
</head>

<body>
    <div class="edica-loader"></div>
    <header class="edica-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="edicaMainNav">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('blog.index')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        @auth
                        @if(auth()->user()->role !== 1)
                        <li class="nav-item active">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <div>
                                    <input type="submit" value="Logout" class="btn btn-dark">
                                </div>
                            </form>
                        </li>
                        @endif
                        @endauth
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
                            @if(auth()->user()->role == 1)
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('admin.index')}}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            @endif
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
            </nav>
        </div>
    </header>

    @yield('blog')

    <script src="{{ asset('assets/vendors/popper.js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/aos/aos.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>
    <script>
        AOS.init({
            duration: 1000
        });
    </script>
</body>

</html>