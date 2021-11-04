@extends('layout')

@section('content')
    <div class="flex flex-col justify-center items-center p-12">
        <h1 class="text-center text-gray-800 dark:text-gray-300 mb-12 text-3xl font-extrabold">Our Products</h1>
        {{-- Products Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @for ($i = 0; $i < 9; $i++)
              <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="/mountain.jpg" alt="Mountain">
                <div class="px-6 py-4">
                  <div class="font-bold text-xl mb-2">Mountain</div>
                  <p class="text-gray-700 text-base">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                  </p>
                </div>
                <div class="px-3 pb-2 flex justify-end">
                  <button class="bg-yellow-400 px-3 py-1 rounded text-xs">Add to Cart</button>
                </div>
              </div>
            @endfor
        </div>    
    </div>
@endsection