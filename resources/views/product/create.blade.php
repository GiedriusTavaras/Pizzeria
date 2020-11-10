@extends('layouts.header')

@section('content')

 

<form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
    <div class="mb-4 shadow-lg mx-4 card bg-white max-w-md p-10 mt-12 md:rounded-lg mx-auto">
        <div class="title">
            <h1 class="font-bold text-center">Add New Product</h1>
        </div>
        <div class="form mt-4">
            <div class="mb-4 flex flex-col text-sm">
                <label for="title" class="font-bold mb-1">Title</label>
                <input class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                    type="text" name="title">
            </div>
            <div class="mb-4 flex flex-col text-sm">
                <label for="title" class="font-bold mb-1">Description</label>
                <textarea
                class="ckeditor summernote shadow-md appearance-none w-full border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                name="description"cols="30" rows="10"></textarea>
            </div>
            <div class="flex flex-col text-sm">
                <label for="title" class="font-bold mb-2">Portret</label>
                <input class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                type="file" name="photo">
            </div>
            <div class="mb-4 flex flex-col text-sm">
                <label for="title" class="font-bold mb-1">Price</label>
                <input class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                type="text" name="price">
            </div>
            <div class="mb-4 flex flex-col text-sm">
                <label for="title" class="font-bold mb-1">Discount rice</label>
                <input class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                type="text" name="discount_price">
            </div>
            <div class="shadow-md flex flex-col text-sm">
                <label for="categorie" class="font-bold mt-4 mt-2">Categories:</label>
                <select name="categorie_id">
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}" @if($categorie->id == old('categorie_id')) selected @endif>
                        {{$categorie->title}} 
                    </option>
                    @endforeach
                </select>
                @csrf
            </div>
        

            <div id="variations"></div>

        <div class="submit">
            <button  type="submit"
                class="shadow-md w-full bg-blue-500 shadow-lg text-white px-3 py-2 hover:bg-blue-700 mt-8 text-center font-semibold focus:outline-none ">Add</button>
        </div>
    </div>
 </form>

 @endsection