import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        screens: {
            'sm': '400px',
            // => @media (min-width: 380px) { ... }

            'md': '500px',
            // => @media (min-width: 500px) { ... }

            'lg': '768px',
            // => @media (min-width: 768px) { ... }

            'xl': '1024px',
            // => @media (min-width: 1024px) { ... }

            '2xl': '1280px',
            // => @media (min-width: 1280px) { ... }

            '3xl': '1920px',
            // => @media (min-width: 1920px) { ... }
        }
    },

    plugins: [forms],
};
