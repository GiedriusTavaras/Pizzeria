@extends('layouts.header')

@section('content')

<form action="{{route('product.index')}}" method="get">
  <div class="md:px-32 py-8 w-full">
    <div class="shadow overflow-hidden rounded border-b border-gray-200">
      <table class=" min-w-0  md:min-w-full bg-white">
        <tbody class="text-gray-700">
          <tr>
            <td class="shadow w-1/7 text-left py-3 px-1 md:px-4"><a href="{{route('product.index')}}">Resest</a></td>
            <td class="shadow w-1/7 text-left py-3 px-1 md:px-4">ASC: <input type="radio" name="dir" value="asc" @if ('asc' == $order) checked @endif></td>
            <td class="shadow w-1/7 text-left py-3 px-1 md:px-4">DESC: <input type="radio" name="dir" value="desc" @if ('desc' == $order) checked @endif></td>
            <td class="shadow w-1/7 text-left py-3 px-1 md:px-4">Title: <input type="radio" name="sort" value="title" @if ('title' == $sort) checked @endif></td>
            <td class="shadow w-1/7 text-left py-3 px-1 md:px-4">Price: <input type="radio" name="sort" value="price" @if ('price' == $sort) checked @endif"></td>
            <td class="shadow w-1/7 text-left py-3 px-1 md:px-4"><button class="text-sm bg-blue-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" type="submit">Sort</button></td>
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



<div class="md:px-32 py-8 w-full">
    <div class="shadow overflow-hidden rounded border-b border-gray-200">
      <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
          <tr>
            <th class="w-1/5 text-left py-3 px-4 uppercase font-semibold text-sm">Product Categorie</th>
            <th class="w-1/5 text-left py-3 px-4 uppercase font-semibold text-sm">Product title</th>
            <th class="w-1/5 text-left py-3 px-4 uppercase font-semibold text-sm">Price</th>
            <th class="w-1/5 text-left py-3 px-4 uppercase font-semibold text-sm">Photo</th>
            <th class="w-1/5 text-left py-3 px-4 uppercase font-semibold text-sm">Edit</th>
            <th class="w-1/5 text-left py-3 px-4 uppercase font-semibold text-sm">Delete</th>
          </tr>
        </thead>
        @foreach ($products as $product)
      <tbody class="text-gray-700">
        <tr>
          <td class="shadow w-1/3 text-left py-3 px-4"><a href="{{route('product.edit',[$product])}}">{{$product->productCategorie->title}}</a></td>
          <td class="shadow w-1/3 text-left py-3 px-4"><a href="{{route('product.edit',[$product])}}">{{$product->title}}</a></td>
          <td class="shadow w-1/3 text-left py-3 px-4"><a href="{{route('product.edit',[$product])}}">{{$product->price}}</a></td>
          @if ($product->photo)
        <td class="hidden md:table-cell"><img src="{{asset('images/'.$product->photo)}}"></td>
        @else 
        <td class="hidden md:table-cell"><img src="https://png.pngtree.com/png-vector/20190130/ourmid/pngtree-hand-drawn-cute-cartoon-burger-with-food-elements-elementlovely-foodcartoon-foodhand-png-image_613521.jpg"></td>
        @endif
        @if ($product->productCategorie->title == 'pizza')
        <td class="shadow text-left py-3 px-4"><a href="{{route('product.edit_pizza',[$product])}}"><button class="text-sm bg-blue-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" type="submit">Edit</button></a></td>
        @endif
        @if ($product->productCategorie->title != 'pizza')
        <td class="shadow text-left py-3 px-4"><a href="{{route('product.edit',[$product])}}"><button class="text-sm bg-blue-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" type="submit">Edit</button></a></td>
        @endif
        <td class="shadow text-left py-3 px-4"><form method="POST" action="{{route('product.destroy', [$product])}}">
            @csrf
            <button class=" text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" type="submit">Delete</button>
           </form>
          </td>
        </tr>
      </tbody>
      @endforeach
      </table>
    </div>
  </div>



@endsection