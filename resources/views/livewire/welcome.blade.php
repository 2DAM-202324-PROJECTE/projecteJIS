<x-tenda-layout xmlns:wire="http://www.w3.org/1999/xhtml">

<div class="relative overflow-hidden bg-white z-0 mt-30">
    <!-- Promo section -->
    <div class="relative isolate bg-gradient-to-b from-indigo-200 via-indigo-100 to-white pt-14">
        <div class="py-24 sm:py-32 lg:pb-40">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">{{__('translate.MISSATGE_PROMOCIONAL_TXT')}}</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="#" class="rounded-md bg-indigo-900 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{__('translate.BOTO_OFERTES_TXT')}}</a>
                        <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Learn more <span aria-hidden="true">→</span></a>
                    </div>
                </div>

            </div>
        </div>
{{--        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">--}}
{{--            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-indigo-900 to-indigo-500 opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>--}}
{{--        </div>--}}
    </div>
    <!-- Featured section -->
    <section class="bg-gradient-to-t from-indigo-50 via-white to-white">
        <div class="mx-auto  max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:items-stretch">
                <div class="grid place-content-center rounded bg-indigo-100 p-6 sm:p-8">
                    <div class="mx-auto max-w-md text-center lg:text-left">
                        <header >
                            <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">{{__('translate.TORRES_TXT')}}</h2>

                            <p class="mt-4 text-gray-700">
                                {{__('translate.MISSATGE_PRODUCTES_DESTACATS_TXT')}}
                            </p>
                        </header>

                        <a
                            href="#"
                            class="mt-8 inline-block rounded border border-gray-900 bg-indigo-900 hover:bg-indigo-800 px-12 py-3 text-sm font-medium text-white transition hover:shadow focus:outline-none focus:ring"
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

    <div class=" bg-gradient-to-t from-white via-indigo-100 to-indigo-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-32">
                <h2 class="text-2xl font-bold text-gray-900">Categories</h2>

                <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">
                    @foreach($categories as $category)

                        <div class="group relative" wire:click="selectCategory({{ $category->id }})">
                            <a href="#">
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
                            </a>
                        </div>
                    @endforeach


                </div>
            </div>

        </div>
    </div>
</div>

</x-tenda-layout>>
