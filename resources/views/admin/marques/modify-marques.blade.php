<x-admin-layout xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="bg-white mt-24">
        @if($marca)

            <form class="m-10" wire:submit.prevent="updateMarca"  method="POST" action="/marques/{{ $marca->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="name"
                                       class="block text-sm font-medium leading-6 text-gray-900">{{__("translate.NOM_FORM_TXT")}}</label>
                                <div class="mt-2">
                                    <div
                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <input type="text" name="name" value="{{ $marca->name }}"
                                               class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                               placeholder="{{__("translate.INTROD_NOM_TXT")}}">
                                        @error('name') <span>{{ $message }}</span> @enderror

                                    </div>
                                </div>
                            </div>


                            <div class="col-span-full">
                                <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">{{__("translate.FOTO_MARCA_TXT")}}</label>
                                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                    <div class="text-center">
                                        <svg wire:loading wire:target="image" class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                             aria-hidden="true">
                                            <!-- SVG de carga -->
                                        </svg>
                                        <div wire:loading.remove wire:target="image">

                                            <img id="brand-image" src="{{ $marca->logo_ref}}" alt="Brand Image" class="mx-auto h-48 w-auto">

                                        </div>

                                            <div class="mt-10 flex text-sm leading-6 text-gray-600">
                                                <label for="file-upload"
                                                       class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                    <span>{{ __("translate.PUJA_FITXER_TXT") }}</span>
                                                    <input id="file-upload" name="image" type="file" class="sr-only"
                                                           wire:model="image">
                                                </label>
                                                <p class="pl-1">{{ __("translate.ARRASTRA_SOLTA_TXT") }}</p>
                                            </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>


                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="{{route("panelMarques")}}">
                        <button type="button"
                                class="text-sm font-semibold leading-6 text-gray-900">{{__("translate.CANCELAR_TXT") }}</button>
                    </a>
                    <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{__("translate.GUARDAR_TXT")}}</button>
                </div>

            </form>

        @endif
    </div>
    <script>
        document.getElementById('file-upload').addEventListener('change', function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('brand-image').src = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>
</x-admin-layout>
