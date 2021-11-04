@extends('layout')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white max-w-3xl p-12 rounded-lg shadow-lg">
            <h1 class="font-extralight text-gray-700 text-2xl">Login</h1>
            <form class="flex flex-col justify-around space-y-4" action="{{route('login')}}" method="POST">
                @csrf

                @if($errors->any())
                    <div class="mb-2">
                        <ul class="text-red-500 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>. {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <input type="email" name="email" placeholder="Email" class="w-full bg-gray-100 p-2 border rounded-lg focus:outline-none 
                    @error('name') border-red-500 @enderror" value="{{old('email')}}">

                <input type="password" name="password" placeholder="Password" class="bg-gray-100 p-2 border rounded-lg focus:outline-none 
                    @error('name') border-red-500 @enderror">

                <button class="p-2 bg-yellow-500 text-white rounded-lg">Submit</button>
            </form>
        </div>
    </div>
@endsection