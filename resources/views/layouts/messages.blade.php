@if ($errors->any())

    @foreach ($errors->all() as $error)
    <div class="mt-2 w-3/6 mx-auto border-solid border-2 border-gray-900 bg-red-500 text-gray-900 text-center px-4 py-3" role="alert">
        {{ $error }}
    </div>
    @endforeach

@endif

@if (session()->has('success_message'))
    <div class="mt-8 bg-green-100 border-t border-b border-green-500 text-green-700 text-center px-4 py-3" role="alert">
        {{ session()->get('success_message') }}
    </div>
@endif

@if (session()->has('info_message'))
<div class="mt-8 bg-yellow-100 border-t border-b border-yellow-500 text-yellow-700 text-center px-4 py-3" role="alert">
        {{ session()->get('info_message') }}
    </div>
@endif

@if (session()->has('error_message'))
<div class="mt-8 bg-red-100 border-t border-b border-red-500 text-red-700 text-center py-4" role="alert">
        {{ session()->get('error_message') }}
    </div>
@endif