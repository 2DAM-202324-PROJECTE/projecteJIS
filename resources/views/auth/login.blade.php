<x-simple-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />


        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 ">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('translate.CORREU_TXT') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">


                <x-label for="password" value="{{ __('translate.CONTRASENYA_TXT') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-700">{{ __('translate.RECORDA_TXT') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 " href="{{ route('password.request') }}">
                        {{ __('translate.OLVIDADA_CONTRA_TXT') }}
                    </a>
                @endif
                    <a class="underline pl-2 text-sm text-gray-600  hover:text-gray-900  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                        {{ __('translate.NO_COMPTE_TXT') }}
                    </a>

                <x-button class="ms-4">
                    {{ __('translate.LOGIN_TXT') }}
                </x-button>
            </div>
        </form>


    </x-authentication-card>
</x-simple-layout>
