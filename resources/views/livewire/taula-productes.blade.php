

<div xmlns:wire="http://www.w3.org/1999/xhtml" xmlns:livewire="">


    <section class="py-24">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
{{--            <h2 class="font-manrope font-bold text-3xl min-[400px]:text-4xl text-black mb-8 max-lg:text-center">Available Products</h2>--}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">


                @foreach ($products as $product)

                <a href="javascript:;" class="max-w-[384px] mx-auto">
                    <div class="w-full max-w-sm aspect-square relative">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full rounded-xl"
                             style="max-height: 300px; min-height: 300px "
                             livewire:src="">
{{--                        <span--}}
{{--                            class="py-1 min-[400px]:py-2 px-2 min-[400px]:px-4 cursor-pointer rounded-lg bg-gradient-to-tr from-indigo-600 to-purple-600 font-medium text-base leading-7 text-white absolute top-3 right-3 z-10">20%--}}
{{--                            Off</span>--}}
                    </div>
                    <div class="mt-5 flex items-center justify-between">
                        <div class="">
                            <h6 class="font-medium text-xl leading-8 text-black mb-2">{{ $product->name }}</h6>
                            <h6 class="font-semibold text-xl leading-8 text-indigo-600">{{ $product->price }}€</h6>
                            <label>
                                <input class="mb-2 border-2 rounded" type="number" min="1" wire:model="quantity">
                            </label>
                        </div>

                        <button
                            class="p-2 min-[400px]:p-4 rounded-full bg-white border border-gray-300 flex items-center justify-center group shadow-sm shadow-transparent transition-all duration-500 hover:shadow-gray-200 hover:border-gray-400 hover:bg-gray-50">

                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" wire:click="addToCart('{{ $product->id }}')">{{ __("translate.AFEGIR_CISTELLA_TXT") }}>
                                <path d="M24 3l-.743 2h-1.929l-3.474 12h-13.239l-4.615-11h16.812l-.564 2h-13.24l2.937 7h10.428l3.432-12h4.195zm-15.5 15c-.828 0-1.5.672-1.5 1.5 0 .829.672 1.5 1.5 1.5s1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm6.9-7-1.9 7c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5z"/>
                            </svg>

                        </button>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
</div>
