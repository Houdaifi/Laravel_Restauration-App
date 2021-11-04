@extends('layout')

@section('content')
    <div class="flex flex-col justify-center items-center p-12">
        <h1 class="text-center text-gray-800 dark:text-gray-300 mb-12 text-3xl font-extrabold">Menu</h1>
        {{-- Products Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($products as $product)
              <div class="max-w-sm rounded overflow-hidden shadow-lg flex flex-col justify-between">
                <img class="w-full h-full" src="{{asset('/attached_files/'.$product->photo)}}" alt="{{$product->name}}">
                <div class="px-6 py-4">
                  <div class="flex justify-between">
                    <div class="font-bold text-xl mb-2">{{$product->name}}</div>
                    <div class="font-black text-lg text-yellow-400">{{$product->price}} Dhs</div>
                  </div>
                  <p class="text-gray-700 text-base">
                    {{$product->description}}
                  </p>
                </div>
                <div class="px-3 pb-2 flex justify-end">
                  <a href="#" class="bg-yellow-400 px-3 py-1 rounded text-xs">Add to Cart</a>
                </div>
              </div>
            @endforeach
        </div>    
    </div>
@endsection