
{{-- <div class="inside-cart">
    <div class="price ">{{$cartAmount}} Eur</div>
    <div>
        <svg height="50px" viewBox="-35 0 512 512.00102" width="50px" xmlns="http://www.w3.org/2000/svg"><path d="m443.054688 495.171875-38.914063-370.574219c-.816406-7.757812-7.355469-13.648437-15.15625-13.648437h-73.140625v-16.675781c0-51.980469-42.292969-94.273438-94.273438-94.273438-51.984374 0-94.277343 42.292969-94.277343 94.273438v16.675781h-73.140625c-7.800782 0-14.339844 5.890625-15.15625 13.648437l-38.9140628 370.574219c-.4492192 4.292969.9453128 8.578125 3.8320308 11.789063 2.890626 3.207031 7.007813 5.039062 11.324219 5.039062h412.65625c4.320313 0 8.4375-1.832031 11.324219-5.039062 2.894531-3.210938 4.285156-7.496094 3.835938-11.789063zm-285.285157-400.898437c0-35.175782 28.621094-63.796876 63.800781-63.796876 35.175782 0 63.796876 28.621094 63.796876 63.796876v16.675781h-127.597657zm-125.609375 387.25 35.714844-340.097657h59.417969v33.582031c0 8.414063 6.824219 15.238282 15.238281 15.238282s15.238281-6.824219 15.238281-15.238282v-33.582031h127.597657v33.582031c0 8.414063 6.824218 15.238282 15.238281 15.238282 8.414062 0 15.238281-6.824219 15.238281-15.238282v-33.582031h59.417969l35.714843 340.097657zm0 0"/></svg>
    <div class="count">{{$cartCount}}</div>
</div>
</div> --}}

{{-- <div class="cart-list" style="padding: 10px">
<ul>
    @foreach ($cartList as $item)
    <li>{{$item->title}} X {{$item->count}}</li>
    @endforeach
</ul>
</div>  --}}



    <div class="flex  justify-center">
        <div class="relative ">
            <div class="flex flex-row cursor-pointer truncate p-2 px-4  rounded">
                <div class="">
                    <div slot="icon" class="relative">
                        <div class="absolute text-xs rounded-full -mt-1 -mr-2 px-1 font-bold top-0 right-0 bg-red-700 text-white">{{$cartCount}}</div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart w-6 h-6 mt-2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="group inline-block">
        <button
          class="outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32"
        >
          <span class="pr-1 font-semibold flex-1">Pizzas</span>
          <span>
            <svg
              class="fill-current h-4 w-4 transform group-hover:-rotate-180
              transition duration-150 ease-in-out"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20">
              <path
                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
              />
            </svg>
          </span>
        </button>
        <ul
          class="bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute 
        transition duration-150 ease-in-out origin-top min-w-32">
        <ul>
            @foreach ($cartList as $item)
            <li class="rounded-sm px-3 py-1 hover:bg-gray-100">{{$item->title}} X {{$item->count}}</li>
            @endforeach
            <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Total {{$cartAmount}} Eur</li>
        </ul>
          

            
            
      
      <style>
        /* li>ul                 { transform: translatex(100%) scale(0) }
        li:hover>ul           { transform: translatex(101%) scale(1) }
        li > button svg       { transform: rotate(-90deg) }
        li:hover > button svg { transform: rotate(-270deg) } */
      
        /* Below styles fake what can be achieved with the tailwind config
           you need to add the group-hover variant to scale and define your custom
           min width style.
             See https://codesandbox.io/s/tailwindcss-multilevel-dropdown-y91j7?file=/index.html
             for implementation with config file
        */
        .group:hover .group-hover\:scale-100 { transform: scale(1) }
        .group:hover .group-hover\:-rotate-180 { transform: rotate(180deg) }
        .scale-0 { transform: scale(0) }
        .min-w-32 { min-width: 8rem }
      </style>



