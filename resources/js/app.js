import '../css/app.css';
import './bootstrap';

import Alpine from 'alpinejs'

Alpine.start()

// If you want Alpine's instance to be available everywhere.
window.Alpine = Alpine

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

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.quick-view-button').forEach(function (button) {
        const modal = document.querySelector('.modal');

        button.addEventListener('click', function () {
            modal.classList.remove('hidden');
        });

        modal.querySelector('.btn-close-modal').addEventListener('click', function () {
            modal.classList.add('hidden');
        });
    });
});




