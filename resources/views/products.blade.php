@extends('layout')

@section('content')
    <div class="flex flex-col justify-center items-center p-12">
        <h1 class="text-center text-gray-800 mb-12 text-3xl font-extrabold">Menu</h1>
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
                @auth
                  <div class="px-3 pb-2 flex justify-end">
                    <button id="{{'btnAdd'.$product->id}}" type="button" class="bg-yellow-400 px-3 py-1 rounded text-xs" onclick="ToogleToCart({{$product->id}})">Add to Cart</button>
                  </div>
                @endauth
              </div>
            @endforeach
        </div>    
    </div>

    <script>
      
      var currentOrders = JSON.parse(sessionStorage.getItem("orders"));

      // Change style Off choosed Products
      function change_cart_button_to_added(product_id){
        const btnClicked = document.getElementById('btnAdd'+product_id);
        btnClicked.innerHTML = "Added";
        btnClicked.classList.remove("bg-yellow-400");
        btnClicked.classList.add("bg-green-400");
      }

      function change_cart_button_to_ToAdd(product_id){
        const btnClicked = document.getElementById('btnAdd'+product_id);
        btnClicked.innerHTML = "Add to Cart";
        btnClicked.classList.add("bg-yellow-400");
        btnClicked.classList.remove("bg-green-400");
      }

      let orders = []

      // recover already added products
      currentOrders.forEach(el => {
        change_cart_button_to_added(el);
        orders.push(el);
      });
      
      function ToogleToCart(product_id){

        if(orders.includes(product_id)){
          var i = orders.indexOf(product_id);
          if(i != -1) {
            orders.splice(i, 1);
          }

          // Change Clicked Btn Style
          change_cart_button_to_ToAdd(product_id);
        }
        else{
          orders.push(product_id)
          // Change Clicked Btn Style
          change_cart_button_to_added(product_id);
        }

        sessionStorage.setItem('orders', JSON.stringify(orders));

        ordersNotif.innerHTML = orders.length;

        document.getElementById('OrdersIds').value = JSON.parse(sessionStorage.getItem("orders"));

      }
    </script>

@endsection
