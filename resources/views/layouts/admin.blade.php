<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pc Planet</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')

    <link href="/resources/css/app.css" rel="stylesheet">
    <!-- Scripts -->

</head>


<body class="antialiased">
{{-- En cas de que hi hagi un usuari loguejat i aquest sigui un admin --}}
@if(Auth::user())
    @if (Auth::user()->role === 'admin')
    <div>

        @livewire('headerAdmin')

            <main>
                {{ $slot }}
            </main>

        @livewire('footer')
        @livewireScripts

    </div>
        <!-- En cas de voler accedir a l'apartat per a admins des de la ruta sense un usuari admin,
         ens redirigirà a la pàgina principal.-->
    @else
        @php
            return redirect()->route('welcome');
        @endphp
    @endif
<!-- En cas de voler accedir sense tenir un user logged-->
@else
    @php
        return redirect()->route('welcome');
    @endphp
@endif

</body>

</html>




