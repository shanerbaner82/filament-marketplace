/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/views/*.blade.php',
    ],
    important: '.filament-marketplace',
    darkMode: 'class',
    theme: {
        extend: {},
    },
    plugins: [],
    corePlugins: {
        preflight: false,
    }
}
