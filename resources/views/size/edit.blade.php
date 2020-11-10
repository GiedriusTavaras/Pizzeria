@extends('layouts.header')

@section('content')

{{-- <form method="POST" action="{{route('size.update',[$size->id])}}">
    Size: <input type="text" name="size_size" value="{{$size->size}}">
    Title: <input type="text" name="size_title" value="{{$size->title}}">
    @csrf
    <button type="submit">EDIT</button>
 </form> --}}
 
 <form method="POST" action="{{route('size.update',[$size->id])}}">
    <div class="mb-4 shadow-lg mx-4 card bg-white max-w-md p-10 mt-12 md:rounded-lg mx-auto">
        <div class="title">
            <h1 class="font-bold text-center">Add New size</h1>
        </div>
        <div class="form mt-4">
            <div class="mb-4 flex flex-col text-sm">
                <label for="title" class="font-bold mb-1">Title</label>
                <input class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                type="text" name="size_title" value="{{old('size_title',$size->title)}}" placeholder="Enter a Title">
            </div>
            @csrf
        <div class="submit">
            <button type="submit"
                class="shadow-md w-full bg-blue-500 shadow-lg text-white px-3 py-2 hover:bg-blue-700 mt-8 text-center font-semibold focus:outline-none ">Create</button>
        </div>
    </div>
 </form>
@endsection