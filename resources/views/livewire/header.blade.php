<div class="flex items-center justify-between">

    <header class="relative " xmlns:x-on="http://www.w3.org/1999/xhtml"
            xmlns:wire="http://www.w3.org/1999/xhtml">

        <div class="fixed top-0 left-0 right-0 z-50 bg-white shadow-md">

            <div class="bg-indigo-900 relative">

                <p class="flex h-8 items-center justify-center px-4 text-xs font-medium text-white sm:px-6 lg:px-8 sm:h-10 sm:text-sm">
                    {{ __('translate.ENVIO_GRATIS_HEADER_TXT') }}
                </p>
                @livewire('idioma-dropdown')
            </div>

            <nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center sm:h-20">

                    <div class="ml-2 sm:ml-4">

                        <button id="navbar-toggle" type="button"
                                class="inline-flex items-center justify-center p-2 w-8 h-8 text-xs text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 sm:w-10 sm:h-10 sm:text-sm">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M1 1h15M1 7h15M1 13h15"/>
                            </svg>
                        </button>

                    </div>

                    <!-- Logo -->
                    <div class="flex-1 flex justify-center">
                        <a href="{{ route('welcome') }}">
                            <span class="sr-only">Pc Planet</span>
                            <img class="h-8 w-auto sm:h-10 lg:h-14" src="{{ asset('Img/logoSimple.png') }}" alt="Pc Planet">
                        </a>
                    </div>

                    <!-- Search -->
                    <div class="flex lg:ml-6 input-wrapper mt-2 lg:w-auto w-1/2">
                        <form id="search-form" action="{{ route('search') }}" method="GET" class="flex">
                            <div class="relative flex-grow">
                                <input type="text" id="search-input" name="query" required autocomplete="off"
                                       class="w-full py-1 px-2 border border-gray-300 focus:outline-none focus:border-gray-300 focus:ring-0">
                                <label for="username"
                                       class="absolute bottom-0 left-0 text-xs text-gray-500 pointer-events-none transition-all duration-300 sm:text-sm">{{ __("translate.BUSCAR_TXT") }}</label>
                            </div>
                            <button type="submit" class="p-2 text-gray-400 hover:text-gray-500 ml-2">
                                <span class="sr-only">Search</span>
                                <svg class="h-4 w-4 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
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

                    @if(\Illuminate\Support\Facades\Auth::check())

                        <div class="sm:flex sm:items-center sm:ms-6">
                            <!-- Teams Dropdown -->
                            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                <div class="ms-3 relative">
                                    <x-dropdown align="right" width="60">
                                        <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  hover:text-gray-700  focus:outline-none focus:bg-gray-50  active:bg-gray-50  transition ease-in-out duration-150">
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
                                                    <div class="border-t border-gray-200 "></div>

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
                                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  bg-white hover:text-gray-700  focus:outline-none focus:bg-gray-50  active:bg-gray-50  transition ease-in-out duration-150">
                                                    {{ Auth::user()->name }}

                                                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                         fill="none"
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
                                        <!-- En cas d'un user ser admin, afegim un link al dropdown -->
                                        @if (Auth::user()->role === 'admin')
                                            <x-dropdown-link
                                                href="{{ route('admin') }}">{{ __('translate.PANEL_ADMIN_TXT') }}</x-dropdown-link>
                                        @endif

                                        <div class="border-t border-gray-200 "></div>

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
                        </div>
                    @endif

                    <!-- CartPage -->
                    <div class="ml-4 flow-root lg:ml-6">
                        <a href="{{ route('cart') }}" class="group -m-2 flex items-center p-2">
                            <svg class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                                 fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                            </svg>
                            <span
                                class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">{{$totalProductesCarro}}</span>
                            <span class="sr-only">items in cart, view bag</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- MENU  -->
            <div class=" hidden w-full " id="navbar-hamburger">

                <!-- divider -->
                <span class="relative flex justify-center">
                        <div
                            class="absolute inset-x-0 top-1/2 h-px -translate-y-1/2 bg-transparent bg-gradient-to-r from-transparent via-gray-500 to-transparent opacity-75"></div>
                    </span>


                <ul class="flex flex-col font-medium mt-4 rounded-lg">
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
                                    <div class="">
                                        <!-- Mostrar imagen correspondiente a la categoría -->
                                        <img src="/Img/{{ $category->name_category }}ICON.png"
                                             alt="{{ $category->name_category }}" class="h-10 w-auto mr-2">


                                    </div>
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
            </div>

        </nav>
    </div>


    <script>
        document.getElementById("navbar-toggle").addEventListener("click", function () {
            var navbarHamburger = document.getElementById("navbar-hamburger");
            navbarHamburger.classList.toggle("hidden");
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const searchForm = document.getElementById('search-form');
            searchForm.addEventListener('submit', function (event) {
                const query = document.getElementById('search-input').value;
                if (query.length < 2) {
                    alert('Por favor, introduzca al menos dos caracteres para buscar.');
                    event.preventDefault();
                }
            });
        });
    </script>

        <script>
            Livewire.on('productAddedToCart', function() {
            @this.call('updateCartQuantity');
            });
        </script>


</header>

</div>
