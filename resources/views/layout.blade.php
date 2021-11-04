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
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="bg-gray-50">

        <nav class="shadow flex justify-between p-2 bg-white">
            <ul class="flex">
                <li class="p-3"><a href="{{route('dashboard')}}">Dashboard</a> </li>
            </ul>
            <ul class="flex">
                @auth
                    <li class="p-3 font-semibold"> <a href="{{route('dashboard')}}"> {{ auth()->user()->username }} </a></li>
                    <li class="p-3">
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="bg-blue-500 rounded-md text-white font-semibold w-24 h-8">Logout</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="p-3"><a href="{{ route('login') }}">Login</a> </li>
                    <li class="p-3"><a href="{{ route('register') }}">Register</a> </li>
                @endguest
            </ul>
        </nav>
        @yield('content')
        
    </body>
</html>
