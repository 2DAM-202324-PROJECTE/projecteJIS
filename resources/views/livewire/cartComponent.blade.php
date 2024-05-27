<div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="mx-auto max-w-3xl">
        <header class="text-center">
            <h1 class="text-xl font-bold text-gray-900 sm:text-3xl">{{ __("translate.CISTELLA_TXT") }}</h1>
        </header>

        <div class="mt-28 flex-col">
                @if ($content->count() > 0)
                    @foreach ($content as $id => $item)
                            <div class=" flex items-center mb-4">
                                <img
                                    src="{{ $item->get('img') }}" alt="{{ $item->get('name') }}"
                                    class="size-24 rounded object-cover"
                                />

                                <div class="m-4">

                                    <h3 class="text-sm text-gray-900">

                                        <button
                                            class="text-sm p-1 border-2 rounded border-gray-200 hover:border-gray-300 bg-gray-200 hover:bg-gray-300"
                                            wire:click="updateCartItem({{ $id }}, 'minus')"> -
                                        </button>


                                        {{ $item->get('name') }}

                                        <button
                                            class="text-sm p-1 border-2 rounded border-gray-200 hover:border-gray-300 bg-gray-200 hover:bg-gray-300"
                                            wire:click="updateCartItem({{ $id }}, 'plus')"> +
                                        </button>

                                    </h3>

                                </div>

                                <div class="flex flex-1 items-center justify-end gap-2">
                                    <form>
                                        <label for="Line1Qty" class="sr-only"> Quantity </label>
                                        <p class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600">{{ $item->get('quantity') }}</p>


                                    </form>

                                    <button class="text-gray-600 transition hover:text-red-600"
                                            wire:click="removeFromCart({{ $id }})">
                                        <span class="sr-only">Remove item</span>

                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="h-4 w-4"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                    @endforeach


            <div class="mt-8 flex justify-end border-t border-gray-100 pt-8">
                <div class="w-screen max-w-lg space-y-4">
                    <dl class="space-y-0.5 text-sm text-gray-700">
                        <div class="flex justify-between">
                            <dt>{{ __("translate.SUBTOTAL_TXT") }}</dt>
                            <dd>+ {{ $total }} €</dd>
                        </div>

                        <div class="flex justify-between">
                            <dt>{{ __("translate.IVA_TXT") }}</dt>
                            <dd>+ {{ $Iva }} €</dd>
                        </div>

                        <div class="flex justify-between">
                            <dt>{{ __("translate.ENVIAMENT_TXT") }}</dt>
                            <dd> {{ $enviament }} €</dd>
                        </div>

                        <div class="flex justify-between !text-base font-medium">
                            <dt>{{ __("translate.TOTAL_TXT") }}</dt>
                            <dd> {{ $totalMesIva }} €</dd>
                        </div>
                    </dl>


                    <div class="flex justify-end pt-4">
                        <button wire:click="finalizarCompraRedirect"
                                class="block rounded bg-indigo-900 px-5 py-3 text-sm text-gray-100 transition hover:bg-gray-600">
                            {{ __("translate.CHECKOUT_TXT")}}
                        </button>

                        <a href="#"
                           class="block ml-3 rounded bg-red-600 px-5 py-3 text-sm text-gray-100 transition hover:bg-red-500"
                           wire:click="clearCart">
                            {{ __("translate.BUIDA_CISTELLA_TXT") }}
                        </a>
                    </div>
                </div>
                @else
                    <p class="text-3xl text-center mb-2">{{ __("translate.CISTELLA_BUIDA_TXT") }}</p>
                @endif

            </div>
        </div>
    </div>
</div>



