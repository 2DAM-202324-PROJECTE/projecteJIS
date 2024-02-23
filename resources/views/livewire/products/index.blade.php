<!DOCTYPE html>
<html lang="ca">
@include('headComu')

<body class="antialiased">
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.product-image').forEach(function (imageContainer) {
            const quickViewButton = imageContainer.querySelector('button');

            imageContainer.addEventListener('mouseenter', function () {
                quickViewButton.style.opacity = '1';
            });

            imageContainer.addEventListener('mouseleave', function () {
                quickViewButton.style.opacity = '0';
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        // Código anterior para mostrar/ocultar el botón Quick View
        document.querySelectorAll('.quick-view-button').forEach(function (button) {
            const modal = document.querySelector('.modal');

            button.addEventListener('click', function () {
                modal.classList.remove('hidden');
                const productContainer = button.closest('.group');
                // Per a mostrar les dades del producte corresponent a la finestra de (Quick View)
                const productName = productContainer.querySelector('.text-gray-600').innerText;
                const productPrice = productContainer.querySelector('.text-gray-900').innerText;


                modal.querySelector('.modal-product-name').innerText = productName;
                modal.querySelector('.modal-product-price').innerText = productPrice;

            });

            modal.querySelector('.btn-close-modal').addEventListener('click', function () {
                modal.classList.add('hidden');
            });
        });
    });

</script>

{{-- Si posem algo fora del div, donarà error(Livewire only supports one HTML element per component. Multiple root elements detected for component: [products]) --}}
<div>
    @include('header')
    <div>
        <nav class="flex" aria-label="Breadcrumb">
            <ol role="list" class="flex items-center space-x-4">
                <li>
                    <div>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <svg class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor"
                                 aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z"
                                      clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Home</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                             aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                  clip-rule="evenodd" />
                        </svg>
                        <a href="#"
                           class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Projects</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                             aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                  clip-rule="evenodd" />
                        </svg>
                        <a href="#"
                           class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                           aria-current="page">Project Nero</a>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-white">
            <div>
                <div class="sm:hidden">
                    <label for="tabs" class="sr-only">Select a tab</label>
                    <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                    <select id="tabs" name="tabs"
                            class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        @foreach($categories as $category)
                            <option>{{ $category->name_category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="hidden sm:block">
                    <div class="border-b border-gray-200">
                        <nav class="-mb-px flex" aria-label="Tabs">
                            @foreach($categories as $category)
                                <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                                <a href="#"
                                   class="border-transparent text-gray-600 hover:border-gray-300 hover:text-gray-700 w-1/4 border-b-2 py-4 px-1 text-center text-sm font-medium">{{ $category->name_category }}</a>
                            @endforeach
                        </nav>
                    </div>
                </div>
            </div>

            <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <div
                    class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                    @foreach ($products as $product)
                        <div class="group relative">
                            <div
                                class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7 product-image">
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                     class="h-full w-full object-cover object-center group-hover:opacity-75">
                                <!-- Botón Quick View -->

                                <button class="quick-view-button absolute top-2 right-2 rounded-full bg-gray-800 text-white px-2 py-1 opacity-0 transition-opacity duration-300">
                                    Quick View
                                </button>

{{--                                <button type="button"--}}
{{--                                        class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white opacity-0 transition duration-300 hover:opacity-100 quick-view-button">--}}
{{--                                    Quick View--}}
{{--                                </button>--}}

                                <!-- Agrega un modal oculto que se mostrará al hacer clic en el botón "Quick View" -->
                                <div class="modal hidden fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                                             role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                            <!-- Contenido del modal -->
                                                    <div class="relative flex w-full items-center overflow-hidden bg-white px-4 pb-8 pt-14 shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">

                                                        <button type="button" class="absolute btn-close-modal right-4 top-4 text-gray-400 hover:text-gray-500 sm:right-6 sm:top-8 md:right-6 md:top-6 lg:right-8 lg:top-8">
                                                            <span class="sr-only">Close</span>
                                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                        </button>

                                                        <div class="grid w-full grid-cols-1 items-start gap-x-6 gap-y-8 sm:grid-cols-12 lg:gap-x-8">
                                                            <div class="aspect-h-3 aspect-w-2 overflow-hidden rounded-lg bg-gray-100 sm:col-span-4 lg:col-span-5">
                                                                <img src="https://tailwindui.com/img/ecommerce-images/product-quick-preview-02-detail.jpg" alt="Two each of gray, white, and black shirts arranged on table." class="object-cover object-center">
                                                            </div>
                                                            <div class="sm:col-span-8 lg:col-span-7">
                                                                <!-- Posant a la classe modal-product-name(son les variables definides al JS), mostrem les dades del producte al que hem fet click-->
                                                                <h2 class="text-lg font-medium text-gray-900 modal-product-name" id="modal-title"></h2>

                                                                <section aria-labelledby="information-heading" class="mt-2">
                                                                    <h3 id="information-heading" class="sr-only">Product information</h3>

                                                                    <p class="text-2xl text-gray-900">$192</p>

                                                                    <div class="mt-4">
                                                                        <p class="text-sm text-gray-500">{{ $product->description }}</p>
                                                                    </div>

                                                                    <!-- Reviews -->
                                                                    <div class="mt-6">
                                                                        <h4 class="sr-only">Reviews</h4>
                                                                        <div class="flex items-center">
                                                                            <div class="flex items-center">
                                                                                <!-- Active: "text-gray-900", Default: "text-gray-200" -->
                                                                                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                                                                </svg>
                                                                                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                                                                </svg>
                                                                                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                                                                </svg>
                                                                                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                                                                </svg>
                                                                                <svg class="text-gray-200 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                                                                </svg>
                                                                            </div>
                                                                            <p class="sr-only">3.9 out of 5 stars</p>
                                                                            <a href="#" class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">117 reviews</a>
                                                                        </div>
                                                                    </div>
                                                                </section>

                                                                <section aria-labelledby="options-heading" class="mt-10">
                                                                    <h3 id="options-heading" class="sr-only">Product options</h3>

                                                                    <form>
                                                                        <!-- Colors -->
                                                                        <div>
                                                                            <h4 class="text-sm font-medium text-gray-900">Color</h4>

                                                                            <fieldset class="mt-4">
                                                                                <legend class="sr-only">Choose a color</legend>
                                                                                <span class="flex items-center space-x-3">
                        <!--
                          Active and Checked: "ring ring-offset-1"
                          Not Active and Checked: "ring-2"
                        -->
                        <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-400">
                          <input type="radio" name="color-choice" value="White" class="sr-only" aria-labelledby="color-choice-0-label">
                          <span id="color-choice-0-label" class="sr-only">White</span>
                          <span aria-hidden="true" class="h-8 w-8 bg-white rounded-full border border-black border-opacity-10"></span>
                        </label>
                                                                                    <!--
                                                                                      Active and Checked: "ring ring-offset-1"
                                                                                      Not Active and Checked: "ring-2"
                                                                                    -->
                        <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-400">
                          <input type="radio" name="color-choice" value="Gray" class="sr-only" aria-labelledby="color-choice-1-label">
                          <span id="color-choice-1-label" class="sr-only">Gray</span>
                          <span aria-hidden="true" class="h-8 w-8 bg-gray-200 rounded-full border border-black border-opacity-10"></span>
                        </label>
                                                                                    <!--
                                                                                      Active and Checked: "ring ring-offset-1"
                                                                                      Not Active and Checked: "ring-2"
                                                                                    -->
                        <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-900">
                          <input type="radio" name="color-choice" value="Black" class="sr-only" aria-labelledby="color-choice-2-label">
                          <span id="color-choice-2-label" class="sr-only">Black</span>
                          <span aria-hidden="true" class="h-8 w-8 bg-gray-900 rounded-full border border-black border-opacity-10"></span>
                        </label>
                      </span>
                                                                            </fieldset>
                                                                        </div>

                                                                        <!-- Sizes -->
                                                                        <div class="mt-10">
                                                                            <div class="flex items-center justify-between">
                                                                                <h4 class="text-sm font-medium text-gray-900">Size</h4>
                                                                                <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Size guide</a>
                                                                            </div>

                                                                            <fieldset class="mt-4">
                                                                                <legend class="sr-only">Choose a size</legend>
                                                                                <div class="grid grid-cols-4 gap-4">
                                                                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                                                                    <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 cursor-pointer bg-white text-gray-900 shadow-sm">
                                                                                        <input type="radio" name="size-choice" value="XXS" class="sr-only" aria-labelledby="size-choice-0-label">
                                                                                        <span id="size-choice-0-label">XXS</span>
                                                                                        <!--
                                                                                          Active: "border", Not Active: "border-2"
                                                                                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                                                        -->
                                                                                        <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                                                                                    </label>
                                                                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                                                                    <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 cursor-pointer bg-white text-gray-900 shadow-sm">
                                                                                        <input type="radio" name="size-choice" value="XS" class="sr-only" aria-labelledby="size-choice-1-label">
                                                                                        <span id="size-choice-1-label">XS</span>
                                                                                        <!--
                                                                                          Active: "border", Not Active: "border-2"
                                                                                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                                                        -->
                                                                                        <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                                                                                    </label>
                                                                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                                                                    <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 cursor-pointer bg-white text-gray-900 shadow-sm">
                                                                                        <input type="radio" name="size-choice" value="S" class="sr-only" aria-labelledby="size-choice-2-label">
                                                                                        <span id="size-choice-2-label">S</span>
                                                                                        <!--
                                                                                          Active: "border", Not Active: "border-2"
                                                                                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                                                        -->
                                                                                        <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                                                                                    </label>
                                                                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                                                                    <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 cursor-pointer bg-white text-gray-900 shadow-sm">
                                                                                        <input type="radio" name="size-choice" value="M" class="sr-only" aria-labelledby="size-choice-3-label">
                                                                                        <span id="size-choice-3-label">M</span>
                                                                                        <!--
                                                                                          Active: "border", Not Active: "border-2"
                                                                                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                                                        -->
                                                                                        <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                                                                                    </label>
                                                                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                                                                    <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 cursor-pointer bg-white text-gray-900 shadow-sm">
                                                                                        <input type="radio" name="size-choice" value="L" class="sr-only" aria-labelledby="size-choice-4-label">
                                                                                        <span id="size-choice-4-label">L</span>
                                                                                        <!--
                                                                                          Active: "border", Not Active: "border-2"
                                                                                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                                                        -->
                                                                                        <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                                                                                    </label>
                                                                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                                                                    <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 cursor-pointer bg-white text-gray-900 shadow-sm">
                                                                                        <input type="radio" name="size-choice" value="XL" class="sr-only" aria-labelledby="size-choice-5-label">
                                                                                        <span id="size-choice-5-label">XL</span>
                                                                                        <!--
                                                                                          Active: "border", Not Active: "border-2"
                                                                                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                                                        -->
                                                                                        <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                                                                                    </label>
                                                                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                                                                    <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 cursor-pointer bg-white text-gray-900 shadow-sm">
                                                                                        <input type="radio" name="size-choice" value="XXL" class="sr-only" aria-labelledby="size-choice-6-label">
                                                                                        <span id="size-choice-6-label">XXL</span>
                                                                                        <!--
                                                                                          Active: "border", Not Active: "border-2"
                                                                                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                                                        -->
                                                                                        <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                                                                                    </label>
                                                                                    <!-- Active: "ring-2 ring-indigo-500" -->
                                                                                    <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 cursor-not-allowed bg-gray-50 text-gray-200">
                                                                                        <input type="radio" name="size-choice" value="XXXL" disabled class="sr-only" aria-labelledby="size-choice-7-label">
                                                                                        <span id="size-choice-7-label">XXXL</span>
                                                                                        <span aria-hidden="true" class="pointer-events-none absolute -inset-px rounded-md border-2 border-gray-200">
                            <svg class="absolute inset-0 h-full w-full stroke-2 text-gray-200" viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">
                              <line x1="0" y1="100" x2="100" y2="0" vector-effect="non-scaling-stroke" />
                            </svg>
                          </span>
                                                                                    </label>
                                                                                </div>
                                                                            </fieldset>
                                                                        </div>

                                                                        <button type="submit" class="mt-6 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add to bag</button>
                                                                    </form>
                                                                </section>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </div>

                                    </div>
                                </div>

                            </div>
                            <h3 class="mt-4 text-sm text-gray-600">{{ $product->name }}</h3>
                            <p class="mt-1 text-lg font-medium text-gray-900">${{ $product->price }}</p>
                        </div>
                    @endforeach
                </div>
                <nav
                    class="flex items-center justify-between border-t border-gray-200 px-4 sm:px-0">
                    <div class="-mt-px flex w-0 flex-1">
                        <a href="#"
                           class="inline-flex items-center border-t-2 border-transparent pr-1 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                            <svg class="mr-3 h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                 fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M18 10a.75.75 0 01-.75.75H4.66l2.1 1.95a.75.75 0 11-1.02 1.1l-3.5-3.25a.75.75 0 010-1.1l3.5-3.25a.75.75 0 111.02 1.1l-2.1 1.95h12.59A.75.75 0 0118 10z"
                                      clip-rule="evenodd" />
                            </svg>
                            Previous
                        </a>
                    </div>
                    <div class="hidden md:-mt-px md:flex">
                        <a href="#"
                           class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">1</a>
                        <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                        <a href="#"
                           class="inline-flex items-center border-t-2 border-indigo-500 px-4 pt-4 text-sm font-medium text-indigo-600"
                           aria-current="page">2</a>
                        <a href="#"
                           class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">3</a>
                        <span
                            class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500">...</span>
                        <a href="#"
                           class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">8</a>
                        <a href="#"
                           class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">9</a>
                        <a href="#"
                           class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">10</a>
                    </div>
                    <div class="-mt-px flex w-0 flex-1 justify-end">
                        <a href="#"
                           class="inline-flex items-center border-t-2 border-transparent pl-1 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                            Next
                            <svg class="ml-3 h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                 fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z"
                                      clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    @include('footer')
</div>
</body>

</html>
