<!DOCTYPE html>
<html lang="ca" xmlns:livewire="urn:oasis:names:tc:xliff:document:1.2">
<head>
    @include('headComu')
    @livewireStyles

</head>
<body class="antialiased">
<div>
    <livewire:header/>
    <div class="relative overflow-hidden bg-white z-0 mt-24">
        <!-- Promo section -->


        <div class="relative  overflow-hidden bg-white z-0">
            <div class="pb-80 pt-16 sm:pb-40 sm:pt-24 lg:pb-48 lg:pt-40">
                <div class="relative mx-auto max-w-7xl px-4 sm:static sm:px-6 lg:px-8">
                    <div class="sm:max-w-lg">
                        <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">{{__('translate.MISSATGE_PROMOCIONAL_TXT')}}</h1>
                        <p class="mt-4 text-xl text-gray-500">Seria sobre els productes en oferta, el boto portarà a aquest apartat.</p>
                    </div>
                    <div>
                        <div class="mt-10">
                            <!-- Decorative image grid -->
                            <div aria-hidden="true"
                                 class="pointer-events-none lg:absolute lg:inset-y-0 lg:mx-auto lg:w-full lg:max-w-7xl">
                                <div
                                    class="absolute transform sm:left-1/2 sm:top-0 sm:translate-x-8 lg:left-1/2 lg:top-1/2 lg:-translate-y-1/2 lg:translate-x-8">
                                    <div class="flex items-center space-x-6 lg:space-x-8">
                                        <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                            <div
                                                class="h-64 w-44 overflow-hidden rounded-lg sm:opacity-0 lg:opacity-100">
                                                <img
                                                    src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-01.jpg"
                                                    alt="" class="h-full w-full object-cover object-center">
                                            </div>
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                                <img
                                                    src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-02.jpg"
                                                    alt="" class="h-full w-full object-cover object-center">
                                            </div>
                                        </div>
                                        <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                                <img
                                                    src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-03.jpg"
                                                    alt="" class="h-full w-full object-cover object-center">
                                            </div>
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                                <img
                                                    src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-04.jpg"
                                                    alt="" class="h-full w-full object-cover object-center">
                                            </div>
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                                <img
                                                    src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-05.jpg"
                                                    alt="" class="h-full w-full object-cover object-center">
                                            </div>
                                        </div>
                                        <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                                <img
                                                    src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-06.jpg"
                                                    alt="" class="h-full w-full object-cover object-center">
                                            </div>
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                                <img
                                                    src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-07.jpg"
                                                    alt="" class="h-full w-full object-cover object-center">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="#"
                               class="inline-block rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-center font-medium text-white hover:bg-indigo-700">{{__('translate.BOTO_OFERTES_TXT')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Featured section -->

        <section>
            <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:items-stretch">
                    <div class="grid place-content-center rounded bg-gray-100 p-6 sm:p-8">
                        <div class="mx-auto max-w-md text-center lg:text-left">
                            <header>
                                <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">Torres</h2>

                                <p class="mt-4 text-gray-500">
                                    {{__('translate.MISSATGE_PRODUCTES_DESTACATS_TXT')}}
                                </p>
                            </header>

                            <a
                                href="#"
                                class="mt-8 inline-block rounded border border-gray-900 bg-gray-900 px-12 py-3 text-sm font-medium text-white transition hover:shadow focus:outline-none focus:ring"
                            >
                                {{__('translate.BOTO_COMPRA_TOTS_TXT')}}
                            </a>
                        </div>
                    </div>

                    <div class="lg:col-span-2 lg:py-8">
                        <ul class="grid grid-cols-2 gap-4">
                            <li>
                                <a href="#" class="group block">
                                    <img
                                        src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1598&q=80"
                                        alt=""
                                        class="aspect-square w-full rounded object-cover"
                                    />

                                    <div class="mt-3">
                                        <h3
                                            class="font-medium text-gray-900 group-hover:underline group-hover:underline-offset-4"
                                        >
                                            Simple Watch
                                        </h3>

                                        <p class="mt-1 text-sm text-gray-700">$150</p>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="group block">
                                    <img
                                        src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1598&q=80"
                                        alt=""
                                        class="aspect-square w-full rounded object-cover"
                                    />

                                    <div class="mt-3">
                                        <h3
                                            class="font-medium text-gray-900 group-hover:underline group-hover:underline-offset-4"
                                        >
                                            Simple Watch
                                        </h3>

                                        <p class="mt-1 text-sm text-gray-700">$150</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Category preview -->

        <div class="bg-gray-100">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-32">
                    <h2 class="text-2xl font-bold text-gray-900">Categories</h2>

                    <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">
                        @foreach($categories as $category)

                            <div class="group relative">
                                <div
                                    class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64">

                                    <img src="{{ $category -> category_image }}" alt="{{ __('translate.CATEGORIES_ARRAY_TXT.' . $category->name_category) }}" class="h-full w-full object-cover object-center">
                                </div>
                                <div class="mb-6 mt-2">
                                    <p class="text-base font-semibold text-gray-900">{{$category -> name_category}}</p>

                                    <h3 class="mb-0 text-sm text-gray-500">
                                        <a href="#">
                                            <span class="absolute inset-0"></span>
                                            <!--Mostrem el contingut corresponent de l'array, respecte al nom de la categoria -->
                                            {{ __('translate.CATEGORIES_DESCRIPTION_ARRAY_TXT.' . $category->name_category) }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>

            </div>
        </div>
    </div>


    @livewire('footer')
</div>
@livewireScripts

</body>
</html>
