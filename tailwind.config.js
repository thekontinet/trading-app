import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
		'./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
		 './storage/framework/views/*.php',
		 './resources/views/**/*.blade.php',
		 "./vendor/robsontenorio/mary/src/View/Components/**/*.php"
	],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                roboto: ['Roboto', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    daisyui: {
        themes: ["light", "dark", {
            mytheme: {
                "primary": "#3b82f6", 
                "primary-content": "#e0f2fe",
                "primary-content": "#010615",
                "secondary": "#d1d5db",
                "secondary-content": "#101011",
                "accent": "#00ffff",
                "accent-content": "#001616",
                "neutral": "#4b5563",
                "neutral-content": "#d8dbde",
                "base-100": "#e5e7eb",
                "base-200": "#c7c9cc",
                "base-300": "#aaabae",
                "base-content": "#121313",
                "info": "#4338ca",
                "info-content": "#d3d9f8",
                "success": "#22c55e",
                "success-content": "#000e03",
                "warning": "#eab308",
                "warning-content": "#130c00",
                "error": "#b91c1c",
                "error-content": "#f7d5d1",
            },
        }],
    },
    plugins: [
		forms,
		require("daisyui")
	],
};
