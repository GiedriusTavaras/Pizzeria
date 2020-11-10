@extends('layouts.header')

@section('content')

{{-- @foreach ($sizes as $size)
<a href="{{route('size.edit',[$size])}}">{{$size->size}} {{$size->title}}</a>
  <form method="POST" action="{{route('size.destroy', [$size])}}">
   @csrf
   <button type="submit">DELETE</button>
  </form>
  <br>
@endforeach --}}


<div class="md:px-32 py-8 w-full">
    <div class="shadow overflow-hidden rounded border-b border-gray-200">
      <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
          <tr>
            <th class="w-1/5 text-left py-3 px-4 uppercase font-semibold text-sm">Size title</th>
            <th class="w-1/5 text-left py-3 px-4 uppercase font-semibold text-sm">Create</th>
            <th class="w-1/5 text-left py-3 px-4 uppercase font-semibold text-sm">Edit</th>
            <th class="w-1/5 text-left py-3 px-4 uppercase font-semibold text-sm">Delete</th>
          </tr>
        </thead>
        @foreach ($sizes as $size)
      <tbody class="text-gray-700">
        <tr>
          <td class="shadow w-1/3 text-left py-3 px-4"><a href="{{route('size.edit',[$size])}}">{{$size->title}}</a></td>
          {{-- <td class="shadow text-left py-3 px-4"><a href="{{route('doctor.show',[$doctor])}}"><button class="text-sm bg-blue-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" type="submit">Show</button></a></td> --}}
          <td class="shadow text-left py-3 px-4"><a href="{{route('size.create',[$size])}}"><button class="text-sm bg-blue-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" type="submit">Create</button></a></td>
          <td class="shadow text-left py-3 px-4"><a href="{{route('size.edit',[$size])}}"><button class="text-sm bg-blue-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" type="submit">Edit</button></a></td>
          <td class="shadow text-left py-3 px-4"><form method="POST" action="{{route('size.destroy', [$size])}}">
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