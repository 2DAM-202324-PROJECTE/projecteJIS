<!-- component -->
<section class="text-gray-700 body-font overflow-hidden bg-white" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <img alt="{{ $product->product }}"
                 class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200"
                 src="{{ $product->image_url }}">
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ $product->marques->name }}</h2>
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $product->name }}</h1>
                <div class="flex mb-4">
{{--          <span class="flex items-center mt-4">--}}
{{--            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                 stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">--}}
{{--              <path--}}
{{--                  d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>--}}
{{--            </svg>--}}
{{--            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                 stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">--}}
{{--              <path--}}
{{--                  d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>--}}
{{--            </svg>--}}
{{--            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                 stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">--}}
{{--              <path--}}
{{--                  d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>--}}
{{--            </svg>--}}
{{--            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                 stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">--}}
{{--              <path--}}
{{--                  d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>--}}
{{--            </svg>--}}
{{--            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                 class="w-4 h-4 text-red-500" viewBox="0 0 24 24">--}}
{{--              <path--}}
{{--                  d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>--}}
{{--            </svg>--}}
{{--            <span class="text-gray-600 ml-3">4 Reviews</span>--}}
{{--          </span>--}}
                    <span class="flex mt-2 pl-3 py-2 border-l-2 border-gray-200">
            <a class="text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                   viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
              </svg>
            </a>
            <a class="ml-2 text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                   viewBox="0 0 24 24">
                <path
                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
              </svg>
            </a>
            <a class="ml-2 text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                   viewBox="0 0 24 24">
                <path
                    d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
              </svg>
            </a>
          </span>
                </div>
                <div class="mt-10">
                    <p class="leading-relaxed">{{ $product->description }}</p>
                    <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
                        <div class="flex ml-6 items-center">
                            <div class="relative">
                                <span class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                                </span>


                                @if($product->price > 250)
                                    <p>Envío gratis</p>
                                @else
                                    <p>Cost d'envío: 5,99 €</p>
                                @endif

                                @if($product->stock > 0)
                                    <p>Stock: {{ $product->stock }}</p>
                                @else
                                    <p>Producte esgotat</p>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="flex mt-10 items-center">
                        <span class="title-font font-medium text-2xl text-gray-900">{{ $product->price }} €</span>
                        <div class="ml-10 ">
                            <button data-quantity="0" class="btn-cart" wire:click="addToCart('{{ $product->id }}')">
                                <svg class="icon-cart" viewBox="0 0 24.38 30.52" height="30.52" width="24.38"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <title>icon-cart</title>
                                    <path transform="translate(-3.62 -0.85)"
                                          d="M28,27.3,26.24,7.51a.75.75,0,0,0-.76-.69h-3.7a6,6,0,0,0-12,0H6.13a.76.76,0,0,0-.76.69L3.62,27.3v.07a4.29,4.29,0,0,0,4.52,4H23.48a4.29,4.29,0,0,0,4.52-4ZM15.81,2.37a4.47,4.47,0,0,1,4.46,4.45H11.35a4.47,4.47,0,0,1,4.46-4.45Zm7.67,27.48H8.13a2.79,2.79,0,0,1-3-2.45L6.83,8.34h3V11a.76.76,0,0,0,1.52,0V8.34h8.92V11a.76.76,0,0,0,1.52,0V8.34h3L26.48,27.4a2.79,2.79,0,0,1-3,2.44Zm0,0"></path>
                                </svg>
                                <span class="quantity"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
