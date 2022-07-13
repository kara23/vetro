<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Vetro</title>
         <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="bg-light">
        <nav class="bg-white d-flex justify-content-between pt-4 pb-3 mb-3">
            <ul class="d-flex items-center list-unstyled">
                @auth
                <li>
                    <a href="{{url('create')}}" class="p-3">Dashboard</a>
                </li>
                <li>
                @else
                <li>
                    <a href="{{route('posts')}}" class="p-3">Posts</a>
                </li>
                @endauth
            </ul>

            <ul class="d-flex items-center list-unstyled">
                @auth
                    <li>
                        <a href="#" class="p-3">{{ Auth::user()->name }}</a>
                    </li>
                    <li>
                    <a href="{{ route('logout') }}" class="p-3">Logout</a>
                </li>
                @else
                <li>
                    <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="p-3">Register</a>
                </li>

                @endauth
                
                  
                
            </ul>
        </nav>
        @yield('content')
    </body>
</html>
