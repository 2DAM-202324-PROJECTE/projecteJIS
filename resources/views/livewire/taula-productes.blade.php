

<div xmlns:wire="http://www.w3.org/1999/xhtml" xmlns:livewire="">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">


            @foreach ($products as $product)
                <div class="group relative">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7 product-image">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="h-full w-full object-cover object-center group-hover:opacity-75" livewire:src="">
                    </div>
                    <h3 class="mt-4 text-sm text-gray-600">{{ $product->name }}</h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">${{ $product->price }}</p>
                    <label>
                        <input class="mb-2 border-2 rounded" type="number" min="1" wire:model="quantity">
                    </label>
                    {{-- Passo la id del producte a la funció addToCart, per a saber quin he d'afegir al carret.--}}

                    <button class="p-2 border-2 rounded border-blue-500 hover:border-blue-600 bg-blue-500 hover:bg-blue-600"
                            wire:click="addToCart('{{ $product->id }}')">{{ __("translate.AFEGIR_CISTELLA_TXT") }}</button>
                </div>
            @endforeach
        </div>
    </div>
</div>
