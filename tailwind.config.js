import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontSize: {
                '2xs': '0.625rem', // 10px, más pequeño que xs
                '3xs': '0.5rem',   // 8px, más pequeño que 2xs
            },
            gridTemplateColumns:{
                '14': 'repeat(14, minmax(0, 1fr))',
            },
        },
    },
    plugins: [],
};
