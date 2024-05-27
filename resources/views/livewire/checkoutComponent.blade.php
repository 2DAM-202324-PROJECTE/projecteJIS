<div class="pb-32 pt-8 grid bg-indigo-50 lg:grid-cols-3 gap-8" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="lg:col-span-2 col-span-3 bg-indigo-50 space-y-8 px-4 lg:px-12">
        <div class="mt-8 p-4 relative flex flex-col sm:flex-row sm:items-center bg-white shadow rounded-md">
            <div class="flex flex-row items-center border-b sm:border-b-0 w-full sm:w-auto pb-4 sm:pb-0">
                <div class="text-yellow-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 sm:w-5 h-6 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="text-sm font-medium ml-3">Checkout</div>
            </div>
            <div class="text-sm tracking-wide text-gray-500 mt-4 sm:mt-0 sm:ml-4">{{ __("translate.ENVIO_DETALLS_TXT") }}</div>
        </div>

        <div class="rounded-md">
            <form id="payment-form" method="POST" wire:submit.prevent="store">
                <section>
                    <h2 class="uppercase tracking-wide text-lg font-semibold text-gray-700 my-2">{{ __("translate.ENVIO_INFO_TXT") }}</h2>
                    <fieldset class="mb-3 bg-white shadow-lg rounded text-gray-600 items-center">
                        <label class="flex border-b border-gray-200 h-12 py-3 items-center m-4 pb-4">
                            <span class="text-right px-2">{{ __("translate.NOM_TXT") }}</span>
                            <input name="name" class="focus:outline-none px-3 w-full" required wire:model="name">
                        </label>
                        <label class="flex border-b border-gray-200 h-12 py-3 items-center m-4 pb-4">
                            <span class="text-right px-2">{{ __("translate.CORREU_TXT") }}</span>
                            <input name="email" type="email" class="focus:outline-none px-3 w-full" required wire:model="email">
                        </label>
                        <label class="flex border-b border-gray-200 h-12 py-3 items-center m-4 pb-4">
                            <span class="text-right px-2">{{ __("translate.ADREÇA_TXT") }}</span>
                            <input name="address" class="focus:outline-none px-3 w-full" required wire:model="address">
                        </label>
                        <label class="flex border-b border-gray-200 h-12 py-3 items-center m-4 pb-4">
                            <span class="text-right px-2">{{ __("translate.CIUTAT_TXT") }}</span>
                            <input name="city" class="focus:outline-none px-3 w-full" required wire:model="city">
                        </label>
                        <label class="flex border-b border-gray-200 h-12 py-3 items-center m-4 pb-4">
                            <span class="text-right px-2">{{ __("translate.ESTAT_TXT") }}</span>
                            <input name="state" class="focus:outline-none px-3 w-full" required wire:model="state">
                        </label>
                        <label class="flex border-b border-gray-200 h-12 py-3 items-center m-4 pb-4">
                            <span class="text-right px-2">{{ __("translate.CP_TXT") }}</span>
                            <input name="postal_code" class="focus:outline-none px-3 w-full" required wire:model="postal_code">
                        </label>
                        <label class="flex border-b border-gray-200 h-12 py-3 items-center m-4 pb-4">
                            <span class="text-right px-2">{{ __("translate.PAIS_TXT") }}</span>
                            <div id="country" class="focus:outline-none px-3 w-full flex items-center">
                            <select name="country" class="border-1 bg-transparent flex-1 cursor-pointer appearance-none focus:outline-none w-full" required wire:model="country">
                                <option value="ES">{{ __("translate.ESPANYA_TXT") }}</option>
                                <option value="GB">{{ __("translate.REGNE_UNIT_TXT") }}</option>
                                <option value="US">{{ __("translate.ESTATS_UNITS_TXT") }}</option>
                            </select>
                            </div>
                        </label>
{{--                        <label class="flex border-t border-gray-200 h-12 py-3 items-center select relative">--}}
{{--                            <span class="text-right px-2">{{ __("translate.PAIS_TXT") }}</span>--}}
{{--                            <div id="country" class="">--}}
{{--                                <select name="country" class="border-1 bg-transparent flex-1 cursor-pointer appearance-none focus:outline-none w-full" required wire:model="country">--}}
{{--                                    <option value="ES">{{ __("translate.ESPANYA_TXT") }}</option>--}}
{{--                                    <option value="GB">{{ __("translate.REGNE_UNIT_TXT") }}</option>--}}
{{--                                    <option value="US">{{ __("translate.ESTATS_UNITS_TXT") }}</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </label>--}}
                    </fieldset>
                </section>
            </form>
        </div>
    </div>

    <div class="col-span-3 lg:col-span-1 bg-white px-4 lg:px-8">
        <h1 class="py-6 border-b-2 text-xl text-gray-600">{{ __("translate.RESUM_ORDRE_TXT") }}</h1>
        <div class="py-6 border-b space-y-6">
            @foreach ($content as $id => $item)
                <div class="grid grid-cols-8 gap-2 border-b pb-4">
                    <div class="col-span-2 lg:col-span-1 self-center">
                        <img src="{{ $item->get('img') }}" alt="{{ $item->get('name') }}" class="rounded w-full">
                    </div>
                    <div class="flex flex-col col-span-6 lg:col-span-3 pt-2 ml-4">
                        <span class="text-gray-600 text-md font-semibold">{{ $item->get('name') }}</span>
                    </div>
                    <div class="col-span-8 lg:col-span-4 pt-3">
                        <div class="flex items-center space-x-2 text-sm justify-between">
                            <span class="text-gray-400"></span>
                            <span class="text-pink-400 font-semibold inline-block">{{ $item->get('quantity') }} x {{ $item->get('price') }}€</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="border-b">
            <div class="flex justify-between py-4 text-gray-600">
                <span>{{ __("translate.SUBTOTAL_TXT") }}</span>
                <span class="font-semibold text-pink-500">{{ $total }}€</span>
            </div>
            <div class="flex justify-between py-4 text-gray-600">
                <span>{{ __("translate.IVA_TXT") }}</span>
                <span class="font-semibold text-pink-500">{{ $calculIva }}€</span>
            </div>
            <div class="flex justify-between py-4 text-gray-600">
                <span>{{ __("translate.ENVIAMENT_TXT") }}</span>
                <span class="font-semibold text-pink-500">{{ $enviament }}</span>
            </div>
        </div>

        <div class="font-semibold text-xl flex justify-between py-8 text-gray-600">
            <span>{{ __("translate.TOTAL_TXT") }}</span>
            <span>{{ $totalMesIvaEnviament }}€</span>
        </div>

        <button class="submit-button mb-4 px-4 py-3 rounded-full bg-indigo-900 text-white focus:ring focus:outline-none w-full text-xl font-semibold transition-colors" wire:click="store">
            {{ __("translate.PAGAR_TXT") }} {{ $totalMesIvaEnviament }}€
        </button>
    </div>

    <script>
        window.addEventListener('alert', event => {
            alert("{{__("translate.DADES_ENVIO_INCORRECTES_TXT")}}");
        });
    </script>

</div>
