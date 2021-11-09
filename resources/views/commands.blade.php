@extends('layout')

@section('content')
    <div class="flex flex-col justify-center items-center p-12">
        <h1 class="text-center text-gray-800 mb-12 text-3xl font-extrabold">Commands</h1>
        {{-- Products Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($commands as $command)
              <div class="rounded overflow-hidden shadow-lg flex flex-col justify-between p-12">
                <div class="flex justify-between items-center text-center">
                    <div class="font-extralight text-xl mb-2">Order № {{$command->id}}</div>
                </div>
                <div class="flex justify-between items-center mb-3">
                    <div class="font-extralight mb-2 text-xs">Created {{$command->created_at}}</div>
                    <div class="bg-green-400 px-2 py-1 text-xs rounded-3xl">{{$command->statut[0]->name}}</div>
                </div>
                @foreach ($command->command_products as $product)
                <div class="flex justify-between space-x-4">
                    <p class="text-sm">{{$product->name}}</p>
                    <p class="text-sm">{{$product->price}} Dhs</p>
                </div>  
                @endforeach
                <hr class="border border-gray-200 my-2">
                <div class="flex justify-between space-x-4">
                    <p class="text-sm">Total</p>
                    <p class="text-sm">100 Dhs</p>
                </div>
              </div>
            @endforeach
        </div>    
    </div>
@endsection
