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
    @vite('resources/js/app.js')



    <link href="/resources/css/app.css" rel="stylesheet">
    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.product-image').forEach(function (imageContainer) {
                const quickViewButton = imageContainer.querySelector('button');

                imageContainer.addEventListener('mouseenter', function () {
                    quickViewButton.style.opacity = '1';
                });

                imageContainer.addEventListener('mouseleave', function () {
                    quickViewButton.style.opacity = '0';
                });
            });
        });


    </script>

</head>


<body class="antialiased">

<div>

    @livewire('header')



        <main>
            {{ $slot }}
        </main>

    @livewire('footer')
    @livewireScripts

</div>

</body>

</html>




