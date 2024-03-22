<form class="m-10" wire:submit.prevent="createProduct" xmlns:wire="http://www.w3.org/1999/xhtml">
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                {{--                <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>--}}
                {{--                <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>--}}

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


                    <div class="sm:col-span-4">
                        <label for="name"
                               class="block text-sm font-medium leading-6 text-gray-900">{{__("translate.NOM_FORM_TXT")}}</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" id="name" wire:model="name" autocomplete="name"
                                       class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                       placeholder="{{__("translate.INTROD_NOM_TXT")}}">
                                @error('name') <span>{{ $message }}</span> @enderror

                            </div>
                        </div>
                    </div>

                    <div class="col-span-full">

                        <label for="description"
                               class="block text-sm font-medium leading-6 text-gray-900">{{__("translate.DESCRIPCIO_FORM_TXT")}}</label>
                        <div class="mt-2">
                            <textarea id="description" wire:model="description" rows="3"
                                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="price"
                               class="block text-sm font-medium leading-6 text-gray-900">{{__("translate.PREU_FORM_TXT")}}</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="number" id="price" wire:model="price" autocomplete="price"
                                       class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                @error('price') <span>{{ $message }}</span> @enderror

                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="stock"
                               class="block text-sm font-medium leading-6 text-gray-900">{{__("translate.STOCK_FORM_TXT")}}</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="number" id="stock" wire:model="stock" autocomplete="price"
                                       class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                @error('stock') <span>{{ $message }}</span> @enderror

                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="image_url"
                               class="block text-sm font-medium leading-6 text-gray-900">{{__("translate.IMAGE_URL_FORM_TXT")}}</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" id="image_url" wire:model="image_url" autocomplete="image_url"
                                       class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                       placeholder="{{__("translate.INTROD_IMG_URL_TXT")}}">
                                @error('image_url') <span>{{ $message }}</span> @enderror

                            </div>
                        </div>
                    </div>


                    <div class="sm:col-span-3">
                        <label for="category_id"
                               class="block text-sm font-medium leading-6 text-gray-900">{{__("translate.CATEGORY_FORM_TXT")}}</label>
                        <div class="mt-2">
                            <select id="category_id" name="category_id" wire:model="category_id"
                                    autocomplete="category_id"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option value="" selected>{{ __("translate.SELECCIONA_CATEG_TXT") }}</option>

                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name_category }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span>{{ $message }}</span> @enderror

                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="state_id"
                               class="block text-sm font-medium leading-6 text-gray-900">{{__("translate.ESTATE_FORM_TXT")}}</label>
                        <div class="mt-2">
                            <select id="state_id" name="state_id" wire:model="state_id" autocomplete="state_id"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option value="" selected>{{ __("translate.SELECCIONA_ESTAT_TXT") }}</option>

                                @foreach($estat as $state)
                                    <option value="{{ $state->id }}">{{ $state->name_state }}</option>

                                @endforeach
                            </select>
                            @error('state_id') <span>{{ $message }}</span> @enderror

                        </div>
                    </div>


                    {{--                    <div class="col-span-full">--}}
                    {{--                        <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Cover photo</label>--}}
                    {{--                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">--}}
                    {{--                            <div class="text-center">--}}
                    {{--                                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">--}}
                    {{--                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />--}}
                    {{--                                </svg>--}}
                    {{--                                <div class="mt-4 flex text-sm leading-6 text-gray-600">--}}
                    {{--                                    <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">--}}
                    {{--                                        <span>Upload a file</span>--}}
                    {{--                                        <input id="file-upload" name="file-upload" type="file" class="sr-only">--}}
                    {{--                                    </label>--}}
                    {{--                                    <p class="pl-1">or drag and drop</p>--}}
                    {{--                                </div>--}}
                    {{--                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>


        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="{{route("panelProducts")}}">
                <button type="button"
                        class="text-sm font-semibold leading-6 text-gray-900">{{__("translate.CANCELAR_TXT") }}</button>
            </a>
            <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{__("translate.GUARDAR_TXT")}}</button>
        </div>

    </form>

