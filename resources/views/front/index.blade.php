<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@extends('layouts.header2') 

{{-- sort --}}
@section('content')
<script> const addToCartApi = "{{route('addToCartApi')}}" </script>
<form action="{{route('front.index')}}" method="get">
    <div class="md:px-32 py-8 w-full">
      <div class="shadow overflow-hidden rounded border-b border-gray-200">
        <table class=" min-w-0  md:min-w-full bg-white">
          <tbody class="text-gray-800">
            <tr>
              <td class="shadow w-1/7 text-left py-3 px-1 md:px-4"><button class="text-sm bg-gray-800 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" type="submit"><a href="{{route('front.index')}}">Resest</a></button></td>
              <td class="shadow w-1/7 text-left py-3 px-1 md:px-4">ASC: <input type="radio" name="dir" value="asc" @if ('asc' == $order) checked @endif></td>
              <td class="shadow w-1/7 text-left py-3 px-1 md:px-4">DESC: <input type="radio" name="dir" value="desc" @if ('desc' == $order) checked @endif></td>
              <td class="shadow w-1/7 text-left py-3 px-1 md:px-4">Title: <input type="radio" name="sort" value="title" @if ('title' == $sort) checked @endif></td>
              <td class="shadow w-1/7 text-left py-3 px-1 md:px-4">Price: <input type="radio" name="sort" value="price" @if ('price' == $sort) checked @endif"></td>
              <td class="shadow w-1/7 text-left py-3 px-1 md:px-4"><button class="text-sm bg-gray-800 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" type="submit">Sort</button></td>
              <td class="shadow w-1/7 text-left py-3 px-1 md:px-4"><select name="categorie_id">
                <option value="0">Show all</option>
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}"@if ($categorie_id == $categorie->id) selected @endif> {{$categorie->title}}</option>
                @endforeach
            </select></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </form>




    <main class="w-full overflow-y-auto">
      <div class="px-10 mt-2 p-2">
        <span class="uppercase font-bold text-2xl text-white"
          >Choose your energy source!</span
        >
      </div>
      <div class="px-10 grid grid-cols-4 gap-4">
        @foreach ($products as $product)
        <div
          class="transition duration-500 ease-in-out transform hover:-translate-y-3 hover:scale-105  col-span-4 sm:col-span-4 md:col-span-2 lg:col-span-1 xl:col-span-1 flex flex-col items-center">
          <div class="bg-white rounded-lg mt-5">
            @if ($product->photo)
            <img
              src="{{asset('images/'.$product->photo)}}"
              class="h-40 rounded-md"
              alt=""
            />
            @else
            <img
            //   src="https://png.pngtree.com/png-vector/20190130/ourmid/pngtree-hand-drawn-cute-cartoon-burger-with-food-elements-elementlovely-foodcartoon-foodhand-png-image_613521.jpg"
              class="h-40 rounded-md"
              alt=""
            />
            @endif
          </div>
          <div class="bg-white shadow-lg rounded-lg -mt-4 w-64">
            <div class="py-5 px-5">
                <div class="modalas">
                    <h3 class="font-bold cursor-pointer text-gray-800 text-lg">{{$product->title}}</h3>
                    </div>
              <div class="flex items-center justify-between">
                <div class="text-sm text-gray-600 font-light">
                  Description : {{$product->description}}
                </div>
                <div class="text-2xl text-red-600 font-bold">
                    {{$product->price}}$ 
                </div>
              </div>
              <td class="shadow text-left py-3 px-4"><a href="{{route('front.show',[$product])}}"><button class="mt-2 text-sm bg-gray-800 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" type="submit">Show</button></a></td>
              <div class="product">
                <input class="ml-2 shadow-md appearance-none border border-gray-200 w-10 focus:outline-none focus:border-gray-500" type="number" name="" id="">
              <td class="shadow text-left py-3 px-4"><button class="ml-2 mt-2 text-sm bg-gray-800 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" value="{{$product->id}}" type="button">Add to card</button></td>
                </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </main>
  </div>

  @endsection



  <div style="z-index: -1;" class="modal-bin modal   fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
      
      <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
        <span class="text-sm">(Esc)</span>
      </div>

      <!-- Add margin if you want to see some of the overlay behind the modal-->
      <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold">Simple Modal!</p>
          <div class="modal-close cursor-pointer z-50">
            <svg class="fill-current cursor-pointer text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
          </div>
        </div>

        <!--Body-->
        <p>Modal content can go here</p>
        <p>...</p>
        <p>...</p>
        <p>...</p>
        <p>...</p>

        <!--Footer-->
        <div class="flex justify-end pt-2">
          <button class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Action</button>
          <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
        </div>
        
      </div>
    </div>
  </div>