<div class="pointer-events-none fixed inset-x-0 bottom-0 px-6 pb-6 z-10" id="cookies-banner" style="display: none">
    <div class="pointer-events-auto ml-auto max-w-xl rounded-xl bg-white p-6 shadow-lg ring-1 ring-gray-900/10">
        <p class="text-sm leading-6 text-gray-900">
            {{ __("translate.COOKIES_DESCRIPCIO_TXT") }}
        </p>
        <div class="mt-4 flex items-center gap-x-5">
            <button onclick="acceptCookies()"
                    class="rounded-md bg-indigo-900 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900"
                    type="button">
                {{ __("translate.ACCEPTA_TXT") }}
            </button>
            <button onclick="rejectCookies()"
                    class="text-sm font-semibold leading-6 transition-colors hover:text-indigo-600 transition-colors hover:text-indigo-600 relative after:block after:content-[''] after:absolute after:h-[3px] after:bg-indigo-600 after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-left"
                    type="button">
                {{ __("translate.REBUTJA_TXT") }}
            </button>
        </div>
    </div>
</div>
