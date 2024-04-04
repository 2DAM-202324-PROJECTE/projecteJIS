<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-indigo-500">
    <div>
        {{ $logo }}
    </div>
    <p>Se canvia el color i tot a views/components/authentication-card.blade.php</p>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-indigo-900  shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
