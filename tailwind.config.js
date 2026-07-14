import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

 theme: {
    extend: {
        fontFamily: {
            sans: ['Figtree', ...defaultTheme.fontFamily.sans],
        },
        colors: {
            primary: {
                50: '#fff1f5',
                100: '#ffe0ea',
                200: '#ffc2d4',
                300: '#ff94b3',
                400: '#fd6a94',
                500: '#f43f75',
                600: '#e11d5e',
                700: '#be124c',
                800: '#9d1245',
                900: '#85123f',
            },
        },
    },
},

    plugins: [forms],
};
