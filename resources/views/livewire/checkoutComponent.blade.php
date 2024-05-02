<div class="pb-32 pt-8 grid bg-indigo-50 grid-cols-3" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="lg:col-span-2 col-span-3 bg-indigo-50 space-y-8 px-12">
        <div class="mt-8 p-4 relative flex flex-col sm:flex-row sm:items-center bg-white shadow rounded-md">
            <div class="flex flex-row items-center border-b sm:border-b-0 w-full sm:w-auto pb-4 sm:pb-0">
                <div class="text-yellow-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 sm:w-5 h-6 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="text-sm font-medium ml-3">Checkout</div>
            </div>
            <div class="text-sm tracking-wide text-gray-500 mt-4 sm:mt-0 sm:ml-4">Complete your shipping details below.</div>

        </div>
        <div class="rounded-md">
            <form id="payment-form" method="POST" wire:submit.prevent="store">
                <section>
                    <h2 class="uppercase tracking-wide text-lg font-semibold text-gray-700 my-2">Shipping & Billing Information</h2>
                    <fieldset class="mb-3 bg-white shadow-lg rounded text-gray-600">
                        <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                            <span class="text-right px-2">{{ __("translate.NOM_TXT") }}</span>
                            <input name="name" class="focus:outline-none px-3"  required="required" wire:model="name">
                        </label>
                        <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                            <span class="text-right px-2">{{ __("translate.CORREU_TXT") }}</span>
                            <input name="email" type="email" class="focus:outline-none px-3" required="required" wire:model="email">
                        </label>
                        <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                            <span class="text-right px-2">{{ __("translate.ADREÇA_TXT") }}</span>
                            <input name="address" class="focus:outline-none px-3" required="required" wire:model="address">
                        </label>
                        <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                            <span class="text-right px-2">{{ __("translate.CIUTAT_TXT") }}</span>
                            <input name="city" class="focus:outline-none px-3"  required=required wire:model="city">
                        </label>
                        <label class="inline-flex w-2/4 border-gray-200 py-3">
                            <span class="text-right px-2">{{ __("translate.ESTAT_TXT") }}</span>
                            <input name="state" class="focus:outline-none px-3"  required="required" wire:model="state">
                        </label>
                        <label class="xl:w-1/4 xl:inline-flex py-3 items-center flex xl:border-none border-t border-gray-200 py-3">
                            <span class="text-right px-2 xl:px-0 xl:text-none">{{ __("translate.CP_TXT") }}</span>
                            <input name="postal_code" class="focus:outline-none px-3" required="required" wire:model="postal_code">
                        </label>
                        <label class="flex border-t border-gray-200 h-12 py-3 items-center select relative">
                            <span class="text-right px-2">{{ __("translate.PAIS_TXT") }}</span>
                            <div id="country" class="focus:outline-none px-3 w-full flex items-center">
                                <select name="country" class="border-none bg-transparent flex-1 cursor-pointer appearance-none focus:outline-none" required="required" wire:model="country">

                                    <option value="ES">{{ __("translate.ESPANYA_TXT") }}</option>
                                    <option value="CA">{{ __("translate.CATALUNYA_TXT") }}</option>
                                    <option value="GB">{{ __("translate.REGNE_UNIT_TXT") }}</option>
                                    <option value="US" >{{ __("translate.ESTATS_UNITS_TXT") }}</option>
                                </select>
                            </div>
                        </label>
                    </fieldset>
                </section>
            </form>
        </div>



{{--        @if($shipmentData)--}}
{{--            <button class="submit-button px-4 py-3 rounded-full bg-indigo-900 text-white focus:ring focus:outline-none w-full text-xl font-semibold transition-colors" wire:click="fillShippingData">--}}
{{--                Rellenar con mis datos de envío--}}
{{--            </button>--}}
{{--        @endif--}}

{{--        <script>--}}
{{--            function fillShippingData() {--}}
{{--                document.querySelector('input[name="address"]').value = "{{ $address }}";--}}
{{--                document.querySelector('input[name="city"]').value = "{{ $city }}";--}}
{{--                document.querySelector('input[name="state"]').value = "{{ $state }}";--}}
{{--                document.querySelector('input[name="postal_code"]').value = "{{ $postal_code }}";--}}
{{--                document.querySelector('select[name="country"]').value = "{{ $country }}";--}}
{{--            }--}}
{{--        </script>--}}

    </div>
    <div class="col-span-1 bg-white lg:block hidden">
        <h1 class="py-6 border-b-2 text-xl text-gray-600 px-8">{{ __("translate.RESUM_ORDRE_TXT") }}</h1>
        <ul class="py-6 border-b space-y-6 px-8">
            @foreach ($content as $id => $item)
            <li class="grid grid-cols-6 gap-2 border-b-1">
                <div class="col-span-1 self-center">
                    <img src="{{ $item->get('img') }}" alt="{{ $item->get('name') }}" class="rounded w-full">
                </div>
                <div class="flex flex-col col-span-3 pt-2">
                    <span class="text-gray-600 text-md font-semi-bold">{{ $item->get('name') }}</span>
                </div>
                <div class="col-span-2 pt-3">
                    <div class="flex items-center space-x-2 text-sm justify-between">
                        <span class="text-gray-400"></span>
                        <span class="text-pink-400 font-semibold inline-block">{{ $item->get('quantity') }} x {{ $item->get('price') }}€</span>
                    </div>
                </div>
            </li>
                @endforeach

        </ul>
        <div class="px-8 border-b">
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
        <div class="font-semibold text-xl px-8 flex justify-between py-8 text-gray-600">
            <span>{{ __("translate.TOTAL_TXT") }}</span>
            <span>{{ $totalMesIvaEnviament }}€</span>
        </div>

        <button class="submit-button px-4 py-3 rounded-full bg-indigo-900 text-white focus:ring focus:outline-none w-full text-xl font-semibold transition-colors" wire:click="store">
            {{ __("translate.PAGAR_TXT") }} {{ $totalMesIvaEnviament }}€
        </button>
    </div>
</div>
