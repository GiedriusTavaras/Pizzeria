@extends('layouts.header2')

@section('content')

<div class="mb-4 shadow-lg mx-4 card bg-white max-w-md p-10 mt-12 md:rounded-lg mx-auto">
    <div class="title">

        <h1 class="font-bold text-center">Product</h1>
    </div>
    <div class="form mt-4">
        <div class="mb-4 flex flex-col text-sm">
            <label for="title" class="font-bold mb-1">Title: {{$product->title}}</label>
            @if ($product->photo)
            <td class="hidden md:table-cell"><img src="{{asset('images/'.$product->photo)}}"></td>
            @else 
            <td class="hidden md:table-cell"><img src="https://png.pngtree.com/png-vector/20190130/ourmid/pngtree-hand-drawn-cute-cartoon-burger-with-food-elements-elementlovely-foodcartoon-foodhand-png-image_613521.jpg"></td>
            @endif
            <label for="title" class="font-bold mb-2">Price: {{$product->price}}</label>
        </div>

        @csrf
    </div>
    <td class="shadow text-left py-3 px-4"><a href="{{ route('front.index')}}"><button
                class="shadow-md w-full bg-blue-600 shadow-lg text-white px-3 py-2 hover:bg-blue-700 mt-8 text-center font-semibold focus:outline-none">Back</button></a>
    </td>
</div>



@endsection