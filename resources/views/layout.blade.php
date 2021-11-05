<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        {{-- Tailwind CSS --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            @import url("https://fonts.googleapis.com/css2?family=Fuggles&display=swap");
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="bg-gray-50">

        <nav class="shadow flex justify-between p-3 bg-white">
            <div style="font-family: 'Fuggles', cursive;" class="flex items-center space-x-1 text-4xl tracking-wider font-extralight cursor-pointer">
                <a href="{{URL('/')}}">Restauration App</a>
                <img src="{{asset('/attached_files/icon.png')}}" alt="icon">
            </div>
            <div class="flex items-center space-x-6">
                @auth
                    {{-- <li class=" font-semibold"> <a href="{{URL('/')}}"> {{ auth()->user()->username }} </a></li> --}}
                    <form action="{{URL('/commands')}}" method="GET">
                        @csrf
                        <button type="submit" class="rounded-md text-black font-semibold w-24 h-8">Commands</button>
                    </form>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="bg-blue-500 rounded-md text-white font-semibold w-24 h-8">Logout</button>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}">Login</a> 
                    <a href="{{ route('register') }}">Register</a> 
                @endguest
            </ul>
        </nav>
        @yield('content')
        
    </body>
</html>
