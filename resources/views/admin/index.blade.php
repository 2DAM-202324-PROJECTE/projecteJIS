<x-admin-layout>
    <div class="bg-white mt-24">


        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto ">
                <div class="flex flex-wrap -m-4 ">
                    <div class="p-4 lg:w-1/3 ">

                        <article
                            class="hover:animate-background rounded-xl bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 p-0.5 shadow-xl transition hover:bg-[length:400%_400%] hover:shadow-sm hover:[animation-duration:_4s]"
                        >
                            <div class="rounded-[10px] bg-white p-4 !pt-20 sm:p-6">

                                <a href="{{route('panelProducts')}}">
                                    <h3 class="mt-0.5 text-lg font-medium text-gray-900">
                                        {{__("translate.VEURE_PRODUCTES_TXT")}}
                                    </h3>
                                </a>

{{--                                <div class="mt-4 flex flex-wrap gap-1">--}}
{{--      <span--}}
{{--          class="whitespace-nowrap rounded-full bg-purple-100 px-2.5 py-0.5 text-xs text-purple-600"--}}
{{--      >--}}
{{--        Snippet--}}
{{--      </span>--}}

{{--                                    <span--}}
{{--                                        class="whitespace-nowrap rounded-full bg-purple-100 px-2.5 py-0.5 text-xs text-purple-600"--}}
{{--                                    >--}}
{{--        JavaScript--}}
{{--      </span>--}}
{{--                                </div>--}}
                            </div>
                        </article>

                        {{--                        <div class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">--}}

                        {{--                        </div>--}}
                    </div>
                    <div class="p-4 lg:w-1/3 ">
                        <article
                            class="hover:animate-background rounded-xl bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 p-0.5 shadow-xl transition hover:bg-[length:400%_400%] hover:shadow-sm hover:[animation-duration:_4s]"
                        >
                            <div class="rounded-[10px] bg-white p-4 !pt-20 sm:p-6">
{{--                                <p class="block text-xs text-gray-500"> 10th Oct 2022</p>--}}

                                <a href="{{route('panelCategories')}}">
                                    <h3 class="mt-0.5 text-lg font-medium text-gray-900">
                                        {{__("translate.VEURE_CATEGORIES_TXT")}}
                                    </h3>
                                </a>

                            </div>
                        </article>

                        {{--                        <div class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">--}}

                        {{--                        </div>--}}
                    </div>
                    <div class="p-4 lg:w-1/3 ">
                        <article
                            class="hover:animate-background rounded-xl bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 p-0.5 shadow-xl transition hover:bg-[length:400%_400%] hover:shadow-sm hover:[animation-duration:_4s]"
                        >
                            <div class="rounded-[10px] bg-white p-4 !pt-20 sm:p-6">

                                <a href="{{ route('featureds') }}">
                                    <h3 class="mt-0.5 text-lg font-medium text-gray-900">
                                        {{__("translate.SELECT_DESTACATS_TXT")}}
                                    </h3>
                                </a>

                            </div>
                        </article>

                    </div>
                    <div class="p-4 lg:w-1/3 ">
                        <article
                            class="hover:animate-background rounded-xl bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 p-0.5 shadow-xl transition hover:bg-[length:400%_400%] hover:shadow-sm hover:[animation-duration:_4s]"
                        >
                            <div class="rounded-[10px] bg-white p-4 !pt-20 sm:p-6">

                                <a href="{{ route('panelMarques') }}">
                                    <h3 class="mt-0.5 text-lg font-medium text-gray-900">
                                        {{__("translate.VEURE_MARQUES_TXT")}}
                                    </h3>
                                </a>

                        </article>

                        {{--                        <div class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">--}}

                        {{--                        </div>--}}
                    </div>


                </div>
            </div>
        </section>




    </div>
</x-admin-layout>
