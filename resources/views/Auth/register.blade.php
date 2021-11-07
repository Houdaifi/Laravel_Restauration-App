@extends('layout')

<style>
    body {overflow: hidden;}
</style>

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="flex flex-col items-center bg-white p-4 rounded-lg shadow-lg">
            <h1 class="font-bold text-gray-700 text-3xl mt-10">Sign Up</h1>
            <form class="flex flex-col justify-around space-y-4" action="{{route('register')}}" method="POST">
                @csrf

                @if($errors->any())
                    <div class="mb-2">
                        <ul class="text-red-500 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <input type="text" name="username" placeholder="Username" class=" w-96 bg-gray-100 p-2 border rounded-lg focus:outline-none 
                    @error('username') border-red-500 @enderror" value="{{old('username')}}">

                <input type="email" name="email" placeholder="Email" class=" w-96 bg-gray-100 p-2 border rounded-lg focus:outline-none 
                    @error('email') border-red-500 @enderror" value="{{old('email')}}">

                <input type="password" name="password" placeholder="Password" class="bg-gray-100 p-2 border rounded-lg focus:outline-none 
                    @error('password') border-red-500 @enderror">

                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="bg-gray-100 p-2 border rounded-lg focus:outline-none 
                    @error('password') border-red-500 @enderror"><br>

                <div class="flex justify-end">
                    <button class="p-2 bg-yellow-500 text-white rounded-lg text-sm px-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection