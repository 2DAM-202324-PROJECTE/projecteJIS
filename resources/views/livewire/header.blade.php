<header class="relative bg-white" xmlns:x-on="http://www.w3.org/1999/xhtml"
        xmlns:wire="http://www.w3.org/1999/xhtml">


    <div class="fixed top-0 left-0 right-0 z-50 bg-white shadow-md ">
        <div class="bg-indigo-900 relative">
            <p class="flex h-10 items-center justify-center px-4 text-sm font-medium text-white sm:px-6 lg:px-8">
                {{ __('translate.ENVIO_GRATIS_HEADER_TXT') }}
            </p>
            <div class="absolute top-0  right-0 mr-7 mt-3 z-10"
                 x-data="{
            open: false,
            toggle() {
            if (this.open) {
            return this.close()
            }

            this.open = true
            },
            close(focusAfter) {
            this.open = false

            focusAfter && focusAfter.focus()
            }
            }"
                 x-on:keydown.escape.prevent.stop="close($refs.button)"
                 x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                 x-id="['dropdown-button']">
                <div>
                    <button
                        x-ref="button"
                        x-on:click="toggle()"
                        :aria-expanded="open"
                        :aria-controls="$id('dropdown-button')"
                        type="button"
                        class="inline-flex items-center  bg-indigo-900  text-sm leading-4 font-medium  text-white   hover:text-gray-100 transition ease-in-out duration-150"
                        id="menu-button" aria-expanded="true" aria-haspopup="true">
                        <!-- Añadir la imagen de la bandera correspondiente al idioma actual -->
                        <img src="Img/Flags/{{ App::getLocale() }}.png" alt="{{ App::getLocale() }}"
                             class="h-4 w-auto mr-2">
                        {{ App::getLocale() }} <!-- Mostrar el idioma actual -->
                        <!-- Heroicon name: solid/chevron-down -->
                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>

                <!-- Dropdown menu, show/hide based on menu state. -->
                <div
                    x-ref="panel"
                    x-show="open"
                    x-transition.origin.top.left
                    x-on:click.outside="close($refs.button)"
                    :id="$id('dropdown-button')"
                    style="display: none;"
                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                    tabindex="-1">
                    <div class="py-1" role="none">
                        <!-- Mostrar los idiomas disponibles en el dropdown -->
                        @if (config('locale.status') && count(config('locale.languages')) > 1)
                            @foreach (array_keys(config('locale.languages')) as $lang)
                                @if ($lang != App::getLocale())
                                    <a href="{!! route('lang.swap', $lang) !!}"
                                       class="text-gray-700 block px-4 py-2 text-sm"
                                       role="menuitem" tabindex="-1">
                                        <!-- Añadir la imagen de la bandera correspondiente al idioma -->
                                        <img src="/Img/Flags/{{ $lang }}.png" alt="{{ $lang }}" class="h-4 w-auto mr-2">
                                        {{ $lang }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center">


                <div class="ml-4">

                    <button id="navbar-toggle" type="button"
                            class="inline-flex items-center justify-center p-2 w-10 h-10 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            aria-controls="navbar-hamburger" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M1 1h15M1 7h15M1 13h15"/>
                        </svg>
                    </button>

{{--                    <a class=" pb-2 text-sm leading-6 text-gray-900">{{ __('translate.MOSTRAR_CATEGORIES_TXT') }}</a>--}}

                </div>

                <!-- Logo -->
                <div class="flex-1  flex justify-center">
                    <a href="{{ route('welcome') }}">
                        <span class="sr-only">Your Company</span>
                        <img class="h-12 w-auto" src="{{ asset('Img/logoSimple.png') }}" alt="Pc Planet">
                    </a>
                </div>

                <!-- Search -->
                <div class="flex lg:ml-6">
                    <form id="search-form" action="{{ route('search') }}" method="GET">
                        <input id="search-input" type="text" name="query" placeholder="{{ __('translate.BUSCAR_TXT') }}" class="p-2 text-gray-400">
                        <button type="submit" class="p-2 text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Search</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </button>
                    </form>

                </div>


                <!-- Flyout menus -->
                <div class="pl-6" xmlns:wire="http://www.w3.org/1999/xhtml">
                    <ul class="flex space-x-8">

                    </ul>
                </div>
                <div class="ml-auto flex items-center justify-center">

                    <div class="flex flex-1 justify-end z-5">
                        @auth
                            <div class="hidden sm:flex sm:items-center sm:ms-6">
                                <!-- Teams Dropdown -->
                                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                    <div class="ms-3 relative">
                                        <x-dropdown align="right" width="60">
                                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium text-gray-700 hover:text-gray-800 leading-4 font-medium rounded-md  dark:bg-gray-800  focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"/>
                                        </svg>
                                    </button>
                                </span>
                                            </x-slot>

                                            <x-slot name="content">
                                                <div class="w-60">
                                                    <!-- Team Management -->
                                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                                        {{ __('Manage Team') }}
                                                    </div>

                                                    <!-- Team Settings -->
                                                    <x-dropdown-link
                                                        href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                                        {{ __('Team Settings') }}
                                                    </x-dropdown-link>

                                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                                            {{ __('Create New Team') }}
                                                        </x-dropdown-link>
                                                    @endcan

                                                    <!-- Team Switcher -->
                                                    @if (Auth::user()->allTeams()->count() > 1)
                                                        <div
                                                            class="border-t border-gray-200 dark:border-gray-600"></div>

                                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                                            {{ __('Switch Teams') }}
                                                        </div>

                                                        @foreach (Auth::user()->allTeams() as $team)
                                                            <x-switchable-team :team="$team"/>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </x-slot>
                                        </x-dropdown>
                                    </div>
                                @endif

                                <!-- Settings Dropdown -->
                                <div class="ms-3 relative">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                <button
                                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                    <img class="h-8 w-8 rounded-full object-cover"
                                                         src="{{ Auth::user()->profile_photo_url }}"
                                                         alt="{{ Auth::user()->name }}"/>
                                                </button>
                                            @else
                                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                                        </svg>
                                    </button>
                                </span>
                                            @endif
                                        </x-slot>

                                        <x-slot name="content">
                                            <!-- Account Management -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('translate.GESTIONAR_COMPTE_TXT') }}
                                            </div>

                                            <x-dropdown-link href="{{ route('profile.show') }}">
                                                {{ __('translate.PERFIL_TXT') }}
                                            </x-dropdown-link>
                                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf

                                                <x-dropdown-link href="{{ route('logout') }}"
                                                                 @click.prevent="$root.submit();">
                                                    {{ __('translate.TANCAR_SESSIO_TXT') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            </div>
                        @else

                            <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">

                                <div class="hidden mr-2 lg:flex lg:gap-x-12">
                                    <a href="{{ route('login') }}"
                                       class="text-sm font-medium text-gray-700 hover:text-gray-800">{{ __('translate.LOGIN_TXT') }}</a>
                                    <span class="h-6 w-px  bg-gray-200" aria-hidden="true"></span>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                           class="text-sm font-medium text-gray-700 hover:text-gray-800">{{ __('translate.REGISTRE_TXT') }}</a>
                                    @endif
                                </div>
                                @endauth
                            </div>






                            <!-- Cart -->
                            <div class="ml-4 flow-root lg:ml-6">
                                <a href="#" class="group -m-2 flex items-center p-2">
                                    <svg class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                                         fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                                    </svg>
                                    <span
                                        class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
                                    <span class="sr-only">items in cart, view bag</span>
                                </a>
                            </div>
                    </div>

                </div>
                <div class="hidden w-full" id="navbar-hamburger">

                    <!-- divider -->
                    <span class="relative flex justify-center">
                        <div class="absolute inset-x-0 top-1/2 h-px -translate-y-1/2 bg-transparent bg-gradient-to-r from-transparent via-gray-500 to-transparent opacity-75"></div>
                    </span>





                    <ul class="flex flex-col font-medium mt-4 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                        <li class="mb-4 ">
                            <h1 class=" mb-2 text-2xl">{{__('translate.LES_NOSTRES_CATEG_TXT')}}</h1>
                            <a href="" class="text-indigo-900 text-lg mt-2">{{__('translate.OFERTES_TXT')}}</a>

                        </li>
                        <!-- Bucle para mostrar las categorías de la base de datos-->

                        <div class="mb-4">
                        @foreach($categories as $category)
                            <li wire:click="selectCategory({{ $category->id }})"
                                class="text-sm font-medium pb-2 text-gray-700 hover:text-gray-800 cursor-pointer">

                                <a href="#"
                                   class="inline-flex items-start p-3 -m-3 transition duration-150 ease-in-out rounded-xl hover:bg-gray-50">
{{--                                    <div class="">--}}
{{--                                        <!-- Mostrar imagen correspondiente a la categoría -->--}}
{{--                                        <img src="/Img/{{ $category->name_category }}ICON.png" alt="{{ $category->name_category }}" class="h-10 w-auto mr-2">--}}


{{--                                    </div>--}}
                                    <div class="ml-4 flex"> <!-- Añadimos la clase flex aquí -->
                                        <div>
                                            <p class="text-base font-medium text-gray-900">
                                                <!-- Mostramos las categorías de la base de datos traducidas -->
                                                {{ __('translate.CATEGORIES_ARRAY_TXT.' . $category->name_category) }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                        </div>

                    </ul>

        </nav>


    </div>


    <script>
        document.getElementById("navbar-toggle").addEventListener("click", function () {
            var navbarHamburger = document.getElementById("navbar-hamburger");
            navbarHamburger.classList.toggle("hidden");
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchForm = document.getElementById('search-form');
            searchForm.addEventListener('submit', function(event) {
                const query = document.getElementById('search-input').value;
                if (query.length < 2) {
                    alert('Por favor, introduzca al menos dos caracteres para buscar.');
                    event.preventDefault(); // Evitar que se envíe el formulario
                }
            });
        });
    </script>



    </div>


</header>

