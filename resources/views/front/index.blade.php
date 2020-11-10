<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@extends('layouts.header2') 


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

{{-- <div class="md:px-32 py-8 w-full">
    <div class="shadow overflow-hidden rounded border-b border-gray-200">
      <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
          <tr>
            <th class="w-1/5 text-left py-3 px-4 uppercase font-semibold text-sm">Categorie</th>
            <th class="w-1/5 text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
            <th class="w-1/5 text-left py-3 px-4 uppercase font-semibold text-sm">Price</th>
            <th class="w-1/5 text-left py-3 px-4 uppercase font-semibold text-sm">Photo</th>
          </tr>
        </thead>
        @foreach ($products as $product)
      <tbody class="text-gray-700">
        <tr>
          <td class="shadow w-1/3 text-left py-3 px-4">{{$product->productCategorie->title}}</td>
          <td class="shadow w-1/3 text-left py-3 px-4">{{$product->title}}</td>
          <td class="shadow w-1/3 text-left py-3 px-4">{{$product->price}}</td>
          @if ($product->photo)
        <td class="hidden md:table-cell"><img src="{{asset('images/'.$product->photo)}}"></td>
        @else 
        <td class="hidden md:table-cell"><img src="https://png.pngtree.com/png-vector/20190130/ourmid/pngtree-hand-drawn-cute-cartoon-burger-with-food-elements-elementlovely-foodcartoon-foodhand-png-image_613521.jpg"></td>
        @endif
        </tr>
      </tbody>
      @endforeach
      </table>
    </div>
  </div>

@endsection --}} 


<!-- component -->
<!-- This is an example component -->
{{-- <div id="menu" class="container mx-auto px-4 lg:pt-1 lg:pb-64">
    <div class="flex flex-wrap text-center justify-center">
      <div class="w-full lg:w-6/12 px-4">
        <h2 class="text-4xl font-semibold text-black">Our Menu</h2>
        <p class="text-lg leading-relaxed mt-4 mb-4 text-gray-500">
          Best menu ever!!! 
        </p>
      </div>
    </div>
    <div class="flex flex-wrap mt-12 justify-center">
    <div class="grid grid-cols-1 sm:grid-cols-6 md:grid-cols-6 lg:grid-cols-6 xl:grid-cols-6 gap-4">
        @foreach ($products as $product)
      <div class="col-span-2 sm:col-span-1 xl:col-span-1">
        @if ($product->photo)
        <img
          alt="..."
          src="{{asset('images/'.$product->photo)}}"
          class="h-24 w-24 rounded  mx-auto"
        />
        @else
        <img
        alt="..."
        src="https://png.pngtree.com/png-vector/20190130/ourmid/pngtree-hand-drawn-cute-cartoon-burger-with-food-elements-elementlovely-foodcartoon-foodhand-png-image_613521.jpg"
        class="h-24 w-24 rounded  mx-auto"
        />
        @endif
      </div>
      <div class="col-span-2 sm:col-span-4 xl:col-span-4">
        <h3 class="font-semibold text-black">{{$product->title}}</h3>
        <p>
            {{$product->description}}
        </p>
      </div>
      <div class="col-span-2 sm:col-span-1 xl:col-span-1 italic ">{{$product->price}}</div>
      @endforeach
    </div>
    </div>
  </div> --}}


<!-- component -->
{{-- <div class="h-screen w-full flex bg-gray-800"> --}}
   
 
      <!-- nav content -->

    <!-- main -->
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
              <span class="font-bold text-gray-800 text-lg">{{$product->title}}</span>
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

  {{-- ===============================================
  

  <td class="shadow w-1/3 text-left py-3 px-4">{{$product->$variation->price}}</a></td> --}}


  @endsection