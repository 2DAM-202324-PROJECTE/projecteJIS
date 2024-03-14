<div class="modal hidden fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title"
     role="dialog" aria-modal="true" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div
        class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
             aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <!-- Contingut Modal -->
            <div
                class="relative flex w-full items-center overflow-hidden bg-white px-4 pb-8 pt-14 shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">

                <button type="button"
                        class="absolute btn-close-modal right-4 top-4 text-gray-400 hover:text-gray-500 sm:right-6 sm:top-8 md:right-6 md:top-6 lg:right-8 lg:top-8">
                    <span class="sr-only">Close</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <div
                    class="grid w-full grid-cols-1 items-start gap-x-6 gap-y-8 sm:grid-cols-12 lg:gap-x-8">
                    <div
                        class="aspect-h-3 aspect-w-2 overflow-hidden rounded-lg bg-gray-100 sm:col-span-4 lg:col-span-5">
                        <img
                            src="https://tailwindui.com/img/ecommerce-images/product-quick-preview-02-detail.jpg"
                            alt="Two each of gray, white, and black shirts arranged on table."
                            class="object-cover object-center">
                    </div>
                    <div class="sm:col-span-8 lg:col-span-7">
                        <h2 class="text-lg font-medium text-gray-900"
                            id="modal-title">{{ $productName }}</h2>

                        <section aria-labelledby="information-heading" class="mt-2">
                            <h3 id="information-heading" class="sr-only">Product
                                information</h3>

                            <p class="text-2xl text-gray-900">$</p>

                            <div class="mt-4">
                                {{--                        <p class="text-sm text-gray-500">{{ $product->description }}</p>--}}
                            </div>

                            <!-- Reviews -->
                            <div class="mt-6">
                                <h4 class="sr-only">Reviews</h4>
                                <div class="flex items-center">
                                    <div class="flex items-center">
                                        <!-- Active: "text-gray-900", Default: "text-gray-200" -->
                                        <svg class="text-gray-900 h-5 w-5 flex-shrink-0"
                                             viewBox="0 0 20 20" fill="currentColor"
                                             aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                        <svg class="text-gray-900 h-5 w-5 flex-shrink-0"
                                             viewBox="0 0 20 20" fill="currentColor"
                                             aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                        <svg class="text-gray-900 h-5 w-5 flex-shrink-0"
                                             viewBox="0 0 20 20" fill="currentColor"
                                             aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                        <svg class="text-gray-900 h-5 w-5 flex-shrink-0"
                                             viewBox="0 0 20 20" fill="currentColor"
                                             aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                        <svg class="text-gray-200 h-5 w-5 flex-shrink-0"
                                             viewBox="0 0 20 20" fill="currentColor"
                                             aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <p class="sr-only">3.9 out of 5 stars</p>
                                    <a href="#"
                                       class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">117
                                        reviews</a>
                                </div>
                            </div>
                        </section>

                        <section aria-labelledby="options-heading" class="mt-10">
                            <h3 id="options-heading" class="sr-only">Product options</h3>
                            <input class="mb-2 border-2 rounded" type="number" min="1"
                                   wire:model="quantity">
                            <button
                                class="mt-6 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                wire:click="addToCart">Add To Cart
                            </button>

                        </section>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


{{--<div x-data="{ isOpen: false }" x-show="isOpen" class="modal fixed z-10 inset-0 overflow-y-auto"--}}
{{--     aria-labelledby="modal-title" role="dialog" aria-modal="true" xmlns:wire="http://www.w3.org/1999/xhtml">--}}
{{--    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">--}}
{{--        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>--}}

{{--        <!-- Contingut Modal -->--}}
{{--        <div--}}
{{--            class="relative flex w-full items-center overflow-hidden bg-white px-4 pb-8 pt-14 shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">--}}

{{--            <button type="button"--}}
{{--                    class="absolute btn-close-modal right-4 top-4 text-gray-400 hover:text-gray-500 sm:right-6 sm:top-8 md:right-6 md:top-6 lg:right-8 lg:top-8">--}}
{{--                <span class="sr-only">Close</span>--}}
{{--                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"--}}
{{--                     stroke="currentColor" aria-hidden="true">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                          d="M6 18L18 6M6 6l12 12"/>--}}
{{--                </svg>--}}
{{--            </button>--}}

{{--            <div--}}
{{--                class="grid w-full grid-cols-1 items-start gap-x-6 gap-y-8 sm:grid-cols-12 lg:gap-x-8">--}}
{{--                <div--}}
{{--                    class="aspect-h-3 aspect-w-2 overflow-hidden rounded-lg bg-gray-100 sm:col-span-4 lg:col-span-5">--}}
{{--                    <img--}}
{{--                        src="https://tailwindui.com/img/ecommerce-images/product-quick-preview-02-detail.jpg"--}}
{{--                        alt="Two each of gray, white, and black shirts arranged on table."--}}
{{--                        class="object-cover object-center">--}}
{{--                </div>--}}
{{--                <div class="sm:col-span-8 lg:col-span-7">--}}
{{--                    <!-- Posant a la classe modal-product-name(son les variables definides al JS), mostrem les dades del producte al que hem fet click-->--}}
{{--                    <h2 class="text-lg font-medium text-gray-900 modal-product-name"--}}
{{--                        id="modal-title"></h2>--}}

{{--                    <section aria-labelledby="information-heading" class="mt-2">--}}
{{--                        <h3 id="information-heading" class="sr-only">Product--}}
{{--                            information</h3>--}}

{{--                        <p class="text-2xl text-gray-900">${{ $productName }}</p>--}}

{{--                        <div class="mt-4">--}}
{{--                            --}}{{--                        <p class="text-sm text-gray-500">{{ $product->description }}</p>--}}
{{--                        </div>--}}

{{--                        <!-- Reviews -->--}}
{{--                        <div class="mt-6">--}}
{{--                            <h4 class="sr-only">Reviews</h4>--}}
{{--                            <div class="flex items-center">--}}
{{--                                <div class="flex items-center">--}}
{{--                                    <!-- Active: "text-gray-900", Default: "text-gray-200" -->--}}
{{--                                    <svg class="text-gray-900 h-5 w-5 flex-shrink-0"--}}
{{--                                         viewBox="0 0 20 20" fill="currentColor"--}}
{{--                                         aria-hidden="true">--}}
{{--                                        <path fill-rule="evenodd"--}}
{{--                                              d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"--}}
{{--                                              clip-rule="evenodd"/>--}}
{{--                                    </svg>--}}
{{--                                    <svg class="text-gray-900 h-5 w-5 flex-shrink-0"--}}
{{--                                         viewBox="0 0 20 20" fill="currentColor"--}}
{{--                                         aria-hidden="true">--}}
{{--                                        <path fill-rule="evenodd"--}}
{{--                                              d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"--}}
{{--                                              clip-rule="evenodd"/>--}}
{{--                                    </svg>--}}
{{--                                    <svg class="text-gray-900 h-5 w-5 flex-shrink-0"--}}
{{--                                         viewBox="0 0 20 20" fill="currentColor"--}}
{{--                                         aria-hidden="true">--}}
{{--                                        <path fill-rule="evenodd"--}}
{{--                                              d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"--}}
{{--                                              clip-rule="evenodd"/>--}}
{{--                                    </svg>--}}
{{--                                    <svg class="text-gray-900 h-5 w-5 flex-shrink-0"--}}
{{--                                         viewBox="0 0 20 20" fill="currentColor"--}}
{{--                                         aria-hidden="true">--}}
{{--                                        <path fill-rule="evenodd"--}}
{{--                                              d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"--}}
{{--                                              clip-rule="evenodd"/>--}}
{{--                                    </svg>--}}
{{--                                    <svg class="text-gray-200 h-5 w-5 flex-shrink-0"--}}
{{--                                         viewBox="0 0 20 20" fill="currentColor"--}}
{{--                                         aria-hidden="true">--}}
{{--                                        <path fill-rule="evenodd"--}}
{{--                                              d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"--}}
{{--                                              clip-rule="evenodd"/>--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                                <p class="sr-only">3.9 out of 5 stars</p>--}}
{{--                                <a href="#"--}}
{{--                                   class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">117--}}
{{--                                    reviews</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </section>--}}

{{--                    <section aria-labelledby="options-heading" class="mt-10">--}}
{{--                        <h3 id="options-heading" class="sr-only">Product options</h3>--}}
{{--                        <input class="mb-2 border-2 rounded" type="number" min="1"--}}
{{--                               wire:model="quantity">--}}
{{--                        <button--}}
{{--                            class="mt-6 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"--}}
{{--                            wire:click="addToCart">Add To Cart--}}
{{--                        </button>--}}

{{--                    </section>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--</div>--}}



