<div xmlns:wire="http://www.w3.org/1999/xhtml" xmlns:livewire="">
    <section class="py-24">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <!-- Capçalera depenent de si entrem per search, categoria o marca-->
            <div class="mb-10" aria-hidden="true">


                @if($selectedCategory)
                    @foreach($categories as $category)
                        @if($category->id == $selectedCategory)

                            <!-- En cas de no trobar la traducció, mostra el valor de la bd sense traducció-->
                            @if( __('translate.CATEGORIES_ARRAY_TXT.' . $category->name_category) != 'translate.CATEGORIES_ARRAY_TXT.' . $category->name_category)
                                <h1 class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-800 via-indigo-50 to-indigo-300  text-5xl font-black">
                                    {{ __('translate.CATEGORIES_ARRAY_TXT.' . $category->name_category) }}
                                </h1>
                            @else
                                <h1 class="bg-clip-text text-transparent bg-gradient-to-r  from-indigo-800 via-indigo-50 to-indigo-300 text-5xl font-black">{{ $category->name_category }}</h1>
                            @endif
                            <div class="mt-2 ml-2">
                                @if( __('translate.CATEGORIES_DESCRIPTION_ARRAY_TXT.' . $category->name_category) != 'translate.CATEGORIES_DESCRIPTION_ARRAY_TXT.' . $category->name_category)
                                    <h3 class="text-lg font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 to-indigo-400">
                                        {{ __('translate.CATEGORIES_DESCRIPTION_ARRAY_TXT.' . $category->name_category) }}
                                    </h3>
                                @else
                                    <h3 class="text-lg font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 to-indigo-400">
                                        {{ $category->category_description }}
                                    </h3>
                                @endif
                            </div>
                        @endif
                    @endforeach
                <!-- Capçalera per a marca-->
                @elseif($selectedBrand)
                    @foreach($brands as $marca)
                        @if($marca->id == $selectedBrand)
                            <p class="text-base font-semibold text-gray-900">{{__("Aquests són els productes de la marca ")}} {{$marca->name }} {{__(", descobreix-los tots!")}}</p>
                        @endif
                    @endforeach
                <!-- Capçalera per a cerca-->
                @elseif($searchParam)
                    @if(!$products->isEmpty())
                    <p class="text-base font-semibold text-gray-900">{{__("Aquests són els productes que coincideixen amb la teva cerca")}}: {{$searchParam}}</p>
                    @else
                        <p class="text-base font-semibold text-gray-900">{{__("No hi ha productes disponibles que coincideixin amb la teva cerca")}}: {{$searchParam}}</p>
                    @endif
                @endif
{{--                    <div class="w-full border-t border-gray-300"></div>--}}

            </div>

            <!-- Llista els productes -->
            @if(!$products->isEmpty())
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    @foreach ($products as $product)
                        <!-- Producte -->
                        <div class="mx-auto mt-11 w-80 transform overflow-hidden rounded-lg bg-gradient-to-br  from-indigo-950 to-indigo-950 shadow-md duration-300 hover:scale-105 hover:shadow-lg">
                            <a href="{{ route('product.show', $product->id) }}" class="max-w-[384px] mx-auto">
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="h-48 w-full object-cover object-center" style="max-height: 300px; min-height: 300px " livewire:src="">
                            </a>
                            <div class="p-4">
                                <h2 class="mb-2 text-lg font-medium text-white ">{{ $product->name }}</h2>
                                {{--                            <p class="mb-2 text-base  text-gray-700">Product description goes here.</p>--}}
                                <div class="pt-2 flex items-center">
                                    <p class="mr-2 text-lg font-semibold text-white">{{ $product->price }}€</p>
                                </div>
                                <div class="flex items-center mb-2">
                                    <label class="mr-2">
                                        <input class="border-2 rounded w-52" type="number" min="1" max="{{ $product->stock }}" wire:model="quantity">
                                    </label>
                                    <button
                                        class="p-2 min-[400px]:p-4 rounded-full bg-white border border-gray-300 flex items-center justify-center group shadow-sm shadow-transparent transition-all duration-500 hover:shadow-gray-200 hover:border-gray-400 hover:bg-gray-50"
                                        wire:click="addToCart('{{ $product->id }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24">
                                            <path
                                                d="M24 3l-.743 2h-1.929l-3.474 12h-13.239l-4.615-11h16.812l-.564 2h-13.24l2.937 7h10.428l3.432-12h4.195zm-15.5 15c-.828 0-1.5.672-1.5 1.5 0 .829.672 1.5 1.5 1.5s1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm6.9-7-1.9 7c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5z"
                                                livewire:d=""/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

        </div>
        <div class="mt-4">
            @if($this->paginator)
                @if(count($this->products) > 0)
                    {{ $this->paginator->links('pagination.pagination') }}
                @else
                    <div class="flex items-center gap-4">
                        <!-- Aquí puedes personalizar cómo se ve la paginación cuando solo hay una página -->
                        <button disabled
                                class="flex items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                 stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                            </svg>
                            1
                        </button>
                    </div>
                @endif
            @endif

            <script>
                Livewire.on('productAddedToCart', function () {
                @this.call('loadProducts');
                });
            </script>
        </div>
        @else
            @if(!$searchParam)

                <p class="text-base font-semibold text-gray-900">{{__("No hi ha productes disponibles TODO_TXT")}}</p>
            @endif
        @endif

    </section>
    <script>
        document.querySelector('input[type="number"]').addEventListener('keydown', function (e) {
            e.preventDefault();
        });
    </script>

</div>
