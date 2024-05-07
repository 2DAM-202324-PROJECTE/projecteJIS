<div class="pb-32 pt-8 ml-10 grid grid-cols-3" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="col-span-1 bg-white lg:block hidden">
        <h1 class="py-6 border-b-2 text-xl text-gray-600 px-8">{{ __("translate.A_PAGAR_TXT") }}</h1>


        <div class="font-semibold text-xl px-8 flex justify-between py-8 text-gray-600">
            <span>{{ __("translate.TOTAL_TXT") }}</span>
            <span>{{ $totalMesIvaEnviament }}€</span>
        </div>
        <div class="px-8 border-b">

        </div>
        <div class="font-semibold text-xl px-8 flex justify-between py-8 text-gray-600">
            <span>{{ __("translate.DESCOMPTE_TXT") }}</span>
            <span>{{ $totalMesIvaEnviament }}€</span>
        </div>

        <button class="submit-button px-4 py-3 rounded-full bg-indigo-900 text-white focus:ring focus:outline-none w-full text-xl font-semibold transition-colors" wire:click="store">
            {{ __("translate.PAGAR_TXT") }} {{ $totalMesIvaEnviament }}€
        </button>
    </div>
</div>
