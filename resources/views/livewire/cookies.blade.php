<div class="pointer-events-none fixed inset-x-0 bottom-0 px-6 pb-6 z-10" id="cookies-banner" style="display: none">
    <div class="pointer-events-auto ml-auto max-w-xl rounded-xl bg-white p-6 shadow-lg ring-1 ring-gray-900/10">
        <p class="text-sm leading-6 text-gray-900">
            Aquest lloc web utilitza galetes per complementar una dieta
            equilibrada y proporcionar una recompensa molt merescuda als sentits
            després de consumir àpats suaus però nutritius. Acceptar les nostres
            galetes és opcional però recomanable, ja que són delicioses. Veure
            la nostra
            <a class="font-semibold text-green-600 underline hover:text-green-900"
               href="Views/cookies.html">política de galetes</a>.
        </p>
        <div class="mt-4 flex items-center gap-x-5">
            <button onclick="acceptCookies()"
                    class="rounded-md bg-green-700 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900"
                    type="button">
                Accepta-ho
            </button>
            <button onclick="rejectCookies()"
                    class="text-sm font-semibold leading-6 transition-colors hover:text-green-600 transition-colors hover:text-green-600 relative after:block after:content-[''] after:absolute after:h-[3px] after:bg-green-600 after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-left"
                    type="button">
                Rebutja-ho
            </button>
        </div>
    </div>
</div>
