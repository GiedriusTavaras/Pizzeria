<header class="bg-purple-800 border-b md:flex md:items-center md:justify-between p-4 pb-0 shadow-lg md:pb-4">

    <!-- Logo text or image -->
    <div class="border-dotted border-4 border-red-600 flex items-center justify-between mb-4 md:mb-0">
        <h1 class=" leading-none text-4xl text-white ">
            Pizza
        </h1>


    </div>
    <!-- END Logo text or image -->


    {{-- @guest
        <ul class="list-reset md:flex md:items-center">
            <li class="md:ml-8 md:mr-8">
                <h1 class="text-white underline">Wellcome! Please login or register before starting!</h1>
            </li>
            @if (Route::has('login'))

                @auth
                    <li class="md:ml-8 md:mr-8">
                        <a href="{{ url('/dashboard') }}"
                            class="text-sm bg-white-500 hover:bg-red-700 text-white mr-10 md:mt-4 py-1 px-2 rounded focus:outline-none focus:shadow-outline">Dashboard</a>
                    </li>
                @else
                    <li class="md:ml-8 md:mr-8">
                        <a href="{{ route('login') }}"
                            class="text-sm bg-white-500 hover:bg-red-700 text-white md:mt-4 py-1 px-2 rounded focus:outline-none focus:shadow-outline">Login</a>
                    </li>

                    @if (Route::has('register'))
                        <li class="md:ml-8 md:mr-8">
                            <a href="{{ route('register') }}"
                                class="text-sm bg-white-500 hover:bg-red-700 text-white md:mt-4 py-1 px-2 rounded focus:outline-none focus:shadow-outline">Register</a>
                        </li>
            </ul>
            @endif
            @endif

            @endif
        @else --}}



            <!-- Global navigation -->
            <nav>
                <ul class="list-reset md:flex md:items-center">
                    {{-- <li class="md:ml-8 py-1 px-2">
                        <h1 class="text-white underline">Hello {{ Auth::user()->name }} !</h1>
                    </li> --}}
                    <li class="md:ml-8">
                        <form method="GET" action="{{ route('size.index') }}">
                            <button
                                class="text-sm bg-white-500 hover:bg-red-700 text-white md:mt-4 py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                type="submit">Sizes</button>
                        </form>
                    </li>
                    <li class="md:ml-8">
                        <form method="GET" action="{{ route('categorie.index') }}">
                            <button
                                class="text-sm bg-white-500 hover:bg-red-700 text-white md:mt-4 py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                type="submit">Categories</button>
                        </form>
                    </li>
                    <li class="md:ml-8">
                        <form method="GET" action="{{ route('product.index') }}">
                            <button
                                class="text-sm bg-white-500 hover:bg-red-700 text-white md:mt-4 py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                type="submit">All products</button>
                        </form>
                    </li>
                    <li class="md:ml-8">
                        <form method="GET" action="{{ route('product.create') }}">
                            <button
                                class="text-sm bg-white-500 hover:bg-red-700 text-white md:mt-4 py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                type="submit">Create product</button>
                        </form>
                    </li>
                    <li class="md:ml-8">
                        <form method="GET" action="{{ route('product.create_pizza') }}">
                            <button
                                class="text-sm bg-white-500 hover:bg-red-700 text-white md:mt-4 py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                type="submit">Create Pizza</button>
                        </form>
                    </li>
                    <li class="md:ml-8 md:mr-8">
                        {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST"> --}}
                            @csrf
                            <button
                                class="text-sm bg-white-500 hover:bg-red-700 text-white md:mt-4 py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- END Global navigation -->

        </header>

    {{-- @endguest --}}