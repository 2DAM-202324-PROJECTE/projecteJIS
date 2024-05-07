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

(function initCookies() {
    function setCookie(name, value, days) {
        const expires = new Date();
        expires.setTime(expires.getTime() + days * 24 * 60 * 60 * 1000);
        document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/`;
    }

    function getCookie(name) {
        const cookies = document.cookie.split('; ');
        for (const cookie of cookies) {
            const [cookieName, cookieValue] = cookie.split('=');
            if (cookieName === name) {
                return cookieValue;
            }
        }
        return null;
    }

    function showCookiesBanner(show) {
        const banner = document.getElementById('cookies-banner');
        if (banner) {
            banner.style.display = show ? 'block' : 'none';
        }
    }

    window.acceptCookies = function() {
        setCookie('cookieNombre', 'valor', 30);
        setCookie('cookieAceptada', 'true', 365);
        showCookiesBanner(false);
    }

    window.rejectCookies = function() {

        showCookiesBanner(false);
    }

    const cookieAceptada = getCookie('cookieAceptada');
    if (cookieAceptada !== 'true') {
        showCookiesBanner(true);
    }
})();








