<x-admin-layout>
    <div class="bg-white mt-24">
        @if($marca)

            <form class="m-10"  method="POST" action="/marques/{{ $marca->id }}">
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


                            <div class="sm:col-span-4">
                                <label for="logo_ref"
                                       class="block text-sm font-medium leading-6 text-gray-900">{{__("translate.IMAGE_URL_FORM_TXT")}}</label>
                                <div class="mt-2">
                                    <div
                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <input type="text"  name="logo_ref" value="{{ $marca->logo_ref }}"
                                               class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                               placeholder="{{__("translate.INTROD_IMG_URL_TXT")}}">
                                        @error('logo_ref') <span>{{ $message }}</span> @enderror

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
</x-admin-layout>
