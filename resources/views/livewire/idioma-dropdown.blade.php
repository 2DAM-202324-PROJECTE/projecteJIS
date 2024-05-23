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
            <!-- Afegir la imatge de la bandera del llenguatge actual -->
            <img src="/Img/Flags/{{ App::getLocale() }}.png" alt="{{ App::getLocale() }}"
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
