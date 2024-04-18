<x-tenda-layout xmlns:wire="http://www.w3.org/1999/xhtml">

<div class="relative overflow-hidden bg-[radial-gradient(circle_at_bottom_left,_var(--tw-gradient-stops))] from-cyan-100 via-sky-50 to-cyan-100z-0 mt-30">

    <!-- Promo section -->
    <div class="relative isolate pt-14 ">
        <div class="py-24 sm:py-32 lg:pb-40">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center ">
                    <h1 class="text-4xl mt-20 font-bold tracking-tight text-gray-900 sm:text-6xl">{{__('translate.MISSATGE_PROMOCIONAL_TXT')}}</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600 ">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="#" class="animate-bounce animate-infinite animate-ease-linear animate-reverse rounded-md bg-indigo-900 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{__('translate.BOTO_OFERTES_TXT')}}</a>
{{--                        <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Learn more <span aria-hidden="true">→</span></a>--}}
                    </div>
                </div>
            </div>
        </div>
{{--        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">--}}
{{--            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-indigo-900 to-indigo-500 opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>--}}
{{--        </div>--}}
    </div>
<div class="20">
    <!-- Featured section with sliders-->
    <div class=" relative w-full mt-20 max-w-screen-2xl mx-auto glide-08 ">
        <!-- Slides -->
        <div class="overflow-hidden text-center bg-white rounded shadow-2xl shadow-slate-200 text-slate-500" data-glide-el="track">
            <ul class="relative w-full overflow-hidden p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
                @foreach ($categories as $category)
                    <li>
                        <section class="">
                            <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
                                <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:items-stretch">
                                    <div class="lg:col-span-1 lg:py-8 flex items-center justify-center">
                                        <div class="rounded  p-6 sm:p-8 max-w-md text-center">
                                            <header>
                                                <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">{{$category->name_category}}</h2>

                                                <p class="mt-4 text-gray-700 ">
                                                    {{__('translate.MISSATGE_PRODUCTES_DESTACATS_TXT')}}
                                                </p>
                                            </header>

{{--                                            <a href="#" wire:click="selectCategory({{ $category->id }})" >--}}
                                                <button wire:click="selectCategory({{ $category->id }})"
                                                        class="mt-4 group group-hover:before:duration-500 group-hover:after:duration-500 after:duration-500 hover:border-indigo-300 hover:before:[box-shadow:_20px_20px_20px_30px_#a21caf] duration-500 before:duration-500 hover:duration-500 underline underline-offset-2 hover:after:-right-8 hover:before:right-12 hover:before:-bottom-8 hover:before:blur hover:underline hover:underline-offset-4  origin-left hover:decoration-2 hover:text-indigo-300 relative bg-indigo-900 h-16 w-52 border text-left p-3 text-gray-50 text-base font-bold rounded-lg  overflow-hidden  before:absolute before:w-12 before:h-12 before:content[''] before:right-1 before:top-1 before:z-10 before:bg-violet-500 before:rounded-full before:blur-lg  after:absolute after:z-10 after:w-20 after:h-20 after:content['']  after:bg-indigo-300 after:right-8 after:top-3 after:rounded-full after:blur-lg">
                                                    {{__('translate.BOTO_COMPRA_TOTS_TXT')}}
                                                </button>
{{--                                            </a>--}}
                                        </div>
                                    </div>

                                    <div class="lg:col-span-2 lg:py-8 ">
                                        <ul class="grid grid-cols-2 gap-4">
                                            @foreach ($category->products()->where('featured', 1)->take(2)->get() as $product)
                                                <li>
                                                    <a href="#" class="group block">
                                                        <div class="aspect-square w-full rounded overflow-hidden">
                                                            <div class="aspect-w-1 aspect-h-1">
                                                                <img src="{{ $product->image_url }}" alt="" class="object-cover w-full h-full">
                                                            </div>
                                                        </div>

                                                        <div class="mt-3">
                                                            <h3 class="font-medium text-gray-900 group-hover:underline group-hover:underline-offset-4">{{ $product->name }}</h3>
                                                            <p class="mt-1 text-sm text-gray-700">{{ $product->price }}€</p>
                                                        </div>
                                                    </a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </li>
                @endforeach
            </ul>
        </div>
        <!-- Indicators -->
        <!-- Indicators -->
        <div class="flex items-center justify-center w-full gap-2 pt-6" data-glide-el="controls[nav]">
            @foreach ($categories as $index => $category)
                <button class="p-4 group" data-glide-dir="={{ $index }}" aria-label="goto slide {{ $index + 1 }}"><span class="block w-2 h-2 transition-colors duration-300 rounded-full opacity-70  bg-indigo-700 focus:outline-none"></span></button>
            @endforeach
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.0.2/glide.js"></script>

    <script>
        var glide07 = new Glide('.glide-08', {
            type: 'slider',
            focusAt: 'center',
            perView: 1,
            autoplay: 3500,
            animationDuration: 700,
            gap: 0,
            classes: {
                activeNav: '[&>*]:bg-slate-700',
            },
        });

        glide07.mount();
    </script>
</div>
    <!-- Categories preview -->
    <div class="mt-20">
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

</x-tenda-layout>
