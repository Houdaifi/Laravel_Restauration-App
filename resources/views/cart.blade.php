@extends('layout')

@section('content')
    <form action="{{route('cart')}}" method="POST" class="container mx-auto mt-10">
        @csrf
        <div class="flex shadow-md my-10">
            <div class="w-3/4 bg-white px-10 py-10">
            <div class="flex justify-between border-b pb-8">
                <h1 class="text-2xl">Meals Cart</h1>
                <h2 class="text-2xl" id="items_length"></h2>
            </div>
            <div class="flex mt-10 mb-5">
                <h3 class="text-gray-600 text-xs uppercase w-2/5">Meal</h3>
                <h3 class=" text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
                <h3 class=" text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
                <h3 class=" text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
            </div>
            @foreach ($products as $key=>$product)
                <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                    <div class="flex w-2/5">
                    <div class="w-20">
                        <img class="h-24 rounded" src="{{asset('/attached_files/'.$product->photo)}}" alt="{{$product->name}}">
                    </div>
                    <div class="flex flex-col justify-around ml-4">
                        <div><span class="font-semibold text-sm">{{$product->name}}</span></div>
                        {{-- <div><button type="button" class="text-red-500 text-xs" onclick="remove_product_from_cart({{$key}})">Remove</button></div> --}}
                    </div>
                    </div>
                    <div class="flex justify-center w-1/5">
                        <input class="mx-2 border text-center w-8" onchange="update_prices()" name="quantity[]" id="{{'qte'.$product->id}}" type="text" value="1">
                    </div>
                    <input type="hidden" id="{{'price'.$product->id}}" value="{{$product->price}}">
                    <span class="text-center w-1/5 text-sm">{{$product->price}} Dhs</span>
                    <input type="hidden" name="products_ids[]" value="{{$product->id}}">
                    <span class="text-center w-1/5 text-sm" id="{{'total_price'.$product->id}}"></span>
                </div>
            @endforeach
            </div>
    
            <div id="summary" class="w-1/4 px-8 py-10">
                <h1 class="text-2xl border-b pb-8">Order Summary</h1>
                <div class="mt-8">
                    <div class="flex justify-between py-6 text-sm uppercase">
                    <div>Total cost</div>
                    <div id="order_total_price"></div>
                    </div>
                    <button type="submit" class="bg-yellow-500 rounded py-3 text-sm text-white uppercase w-full">Order</button>
                </div>
            </div>
    
        </div>
    </form>

    <script>
        let choosedItems = JSON.parse(sessionStorage.getItem("orders"));

        // Set items length
        document.getElementById('items_length').innerHTML = choosedItems.length + ' Items';

        function update_prices(){
            let price = 0;
            choosedItems.forEach(el => {
                const product_qte = document.getElementById('qte'+el);
                const product_price = document.getElementById('price'+el);
                const total_product_price = document.getElementById('total_price'+el);
                const order_total_price = document.getElementById('order_total_price');

                price += product_qte.value * product_price.value;
                order_total_price.innerHTML = price + " Dhs";

                total_product_price.innerHTML = (product_qte.value * product_price.value) + " Dhs";
            });
        }

        update_prices();
    </script>
@endsection