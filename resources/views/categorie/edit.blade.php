@extends('layouts.header')

@section('content')

{{-- <form method="POST" action="{{route('categorie.update',[$categorie->id])}}">
    Title: <input type="text" name="categorie_title" value="{{$categorie->title}}">
    @csrf
    <button type="submit">EDIT</button>
 </form> --}}
 



<form method="POST" action="{{route('categorie.update',[$categorie->id])}}">
    <div class="mb-4 shadow-lg mx-4 card bg-white max-w-md p-10 mt-12 md:rounded-lg mx-auto">
        <div class="title">
            <h1 class="font-bold text-center">Add New categorie</h1>
        </div>
        <div class="form mt-4">
            <div class="mb-4 flex flex-col text-sm">
                <label for="title" class="font-bold mb-1">Title</label>
                <input class="shadow-md appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500"
                type="text" name="categorie_title" value="{{old('categorie_title',$categorie->title)}}" placeholder="Enter a Title">
            </div>
            @csrf
        <div class="submit">
            <button type="submit"
                class="shadow-md w-full bg-blue-500 shadow-lg text-white px-3 py-2 hover:bg-blue-700 mt-8 text-center font-semibold focus:outline-none ">Create</button>
        </div>
    </div>
 </form>



 @endsection