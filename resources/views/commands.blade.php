@extends('layout')

@section('content')
    <div class="flex flex-col justify-center items-center p-12">
        <h1 class="text-center text-gray-800 mb-12 text-3xl font-extrabold">Commands</h1>
        {{-- Products Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($commands as $command)
              <div class="max-w-sm rounded overflow-hidden shadow-lg flex flex-col justify-between">
                <div class="px-6 py-4">
                  <div class="flex justify-between">
                    <div class="font-bold text-xl mb-2">Commanded {{$command->command_products}}</div>
                    <div class="font-black text-lg text-yellow-400">{{$command->created_at}} Dhs</div>
                  </div>
                  <p class="text-gray-700 text-base">
                    {{$command->created_at}}
                  </p>
                </div>
                <div class="bg-yellow-400 px-3 py-1 rounded text-xs">Add to Cart</div>
              </div>
            @endforeach
        </div>    
    </div>
@endsection
