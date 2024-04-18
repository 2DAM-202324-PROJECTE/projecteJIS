<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pc Planet</title>
    @vite('resources/css/app.css')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
{{--    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">--}}
    @vite('resources/js/AlertWind.jsx')
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

        // document.addEventListener('DOMContentLoaded', function () {
        //     document.querySelectorAll('.quick-view-button').forEach(function (button) {
        //         const modal = document.querySelector('.modal');
        //
        //         button.addEventListener('click', function () {
        //             modal.classList.remove('hidden');
        //             const productContainer = button.closest('.group');
        //             // Per a mostrar les dades del producte corresponent a la finestra de (Quick View)
        //             const productName = productContainer.querySelector('.text-gray-600').innerText;
        //             const productPrice = productContainer.querySelector('.text-gray-900').innerText;
        //
        //
        //             modal.querySelector('.modal-product-name').innerText = productName;
        //             modal.querySelector('.modal-product-price').innerText = productPrice;
        //
        //         });
        //
        //         modal.querySelector('.btn-close-modal').addEventListener('click', function () {
        //             modal.classList.add('hidden');
        //         });
        //     });
        // });

    </script>


</head>


