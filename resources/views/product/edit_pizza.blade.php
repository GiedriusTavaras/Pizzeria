@extends('layouts.header')

@section('content')

<script> const createPizzaVariation="{{route('product.create_pizza_variation')}}"</script>
    <form method="POST" action="{{ route('product.update_pizza', [$product]) }}" enctype="multipart/form-data">
        <div class="mb-4 shadow-lg mx-4 card bg-white max-w-md p-10 mt-12 md:rounded-lg mx-auto">
            <div class="title">
                <h1 class="font-bold text-center">Edit Pizza</h1>
            </div>
            <div class="form mt-4">
                <div class="mb-4 flex flex-col text-sm">
                    <label for="title" class="font-bold mb-1">Title</label>
                    <input
                        class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                        type="text" name="title" value="{{ old('product_title', $product->title) }}">
                </div>
                <div class="mb-4 flex flex-col text-sm">
                    <label for="title" class="font-bold mb-1">Description</label>
                    <textarea
                        class="ckeditor summernote shadow-md appearance-none w-full border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                        name="description" cols="30"
                        rows="2">{{ old('product_description', $product->description) }}</textarea>
                </div>
                <div class="flex flex-col text-sm">
                    <label for="title" class="font-bold mb-2">Portret</label>
                    <input
                        class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                        type="file" name="photo">
                </div>
                <div class="mb-4 flex flex-col text-sm">
                    <label for="title" class="font-bold mb-1">Price</label>
                    <input
                        class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                        type="text" name="price" value="{{ old('product_price', $product->price) }}">
                </div>
                <div class="mb-4 flex flex-col text-sm">
                    <label for="title" class="font-bold mb-1">Discount pice</label>
                    <input
                        class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                        type="text" name="discount_price"
                        value="{{ old('product_discount_price', $product->discount_price) }}">
                </div>
                <div class="shadow-md flex flex-col text-sm">
                    <label for="categorie" class="font-bold mt-4 mt-2">Categories:</label>
                    <select name="categorie_id">
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}" @if ($categorie->id == old('categorie_id')) selected
                        @endif>
                        {{ $categorie->title }}
                        </option>
                        @endforeach
                    </select>
                    @csrf
                </div>
                <div id="variations"></div>





                @foreach ($product->variations as $variation)
                ------------------------------------------
                <section>
                    <div class="mb-4 flex flex-col text-sm">
                        <label for="title" class="font-bold mb-1">Description</label>
                        <textarea
                            class="ckeditor summernote shadow-md appearance-none w-full border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                            name="v_description[]" cols="10" rows="2">{{ old('variation_description', $variation->description) }}</textarea>
                    </div>
                    <div class="flex flex-col text-sm">
                        <label for="title" class="font-bold mb-2">Photo</label>
                        <input
                            class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                            type="file" name="v_photo[]">
                    </div>
                    <div class="mb-4 flex flex-col text-sm">
                        <label for="title" class="font-bold mb-1">Price</label>
                        <input
                            class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                            type="text" name="v_price[]" value="{{ old('variation_price', $variation->price) }}">
                    </div>
                    <div class="mb-4 flex flex-col text-sm">
                        <label for="title" class="font-bold mb-1">Discount price</label>
                        <input
                            class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                            type="text" name="v_discount_price[]" value="{{ old('variation_discount_price', $variation->discount_price) }}">
                    </div>
                    <div class="shadow-md flex flex-col text-sm">
                        <input type="hidden" name="v[]" value="1">
                        <input type="hidden" name="v_id[]" value="{{$variation->id}}">
                        <label class="font-bold mt-4 mt-2">Size</label><select name="v_size_id[]">
                            @foreach ($sizes as $size)
                                <option value="{{ $size->id }}" @if ($size->id == $variation->size_id) selected  @endif >{{ $size->title }}</option>
                            @endforeach
                        </select>
                        <label class="remove" style="cursor: pointer"  for="_{{$variation->id}}">X</label>
                         <input type="hidden" name="v_remove[]" id="_{{$variation->id}}" value="0" >
                </section>
                @endforeach
                <div class="submit">
                    <button id="add-variation" type="button"
                        class="shadow-md w-full bg-blue-500 shadow-lg text-white px-3 py-2 hover:bg-blue-700 mt-8 text-center font-semibold focus:outline-none ">Add variation</button>
                </div>
            </div>






            <div class="submit">
                <button type="submit"
                    class="shadow-md w-full bg-blue-500 shadow-lg text-white px-3 py-2 hover:bg-blue-700 mt-8 text-center font-semibold focus:outline-none ">Save</button>
            </div>
        </div>
    </form>

@endsection
