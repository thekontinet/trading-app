import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: ['selector', '[data-theme="dark"]'],
    content: [
		'./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
		 './storage/framework/views/*.php',
		 './resources/views/**/*.blade.php',
		 "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
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
            mythemelight: {
                "primary": "#FCB420",
                "primary-content": "#000000",
                "secondary": "#07060e",
                "secondary-content": "#ffffff",
                "accent": "#00b3b3",
                "accent-content": "#ffffff",
                "neutral": "#3d4451",
                "neutral-content": "#ffffff",
                "base-100": "#ffffff",
                "base-200": "#f2f2f2",
                "base-300": "#e5e6e6",
                "base-content": "#1f2937",
                "info": "#3b82f6",
                "info-content": "#ffffff",
                "success": "#22c55e",
                "success-content": "#ffffff",
                "warning": "#f59e0b",
                "warning-content": "#000000",
                "error": "#ef4444",
                "error-content": "#ffffff"
            },
            mythemedark: {
                "primary": "#FCB420",

                "primary-content": "#000000",

                "secondary": "#1c1c19",

                "secondary-content": "#ffffff",

                "accent": "#00a9ff",

                "accent-content": "#000a16",

                "neutral": "#34272a",

                "neutral-content": "#d3cfd0",

                "base-100": "#2c2c26",

                "base-200": "#252520",

                "base-300": "#1e1e19",

                "base-content": "#d0d0cf",

                "info": "#007ee5",

                "info-content": "#000512",

                "success": "#34d257",

                "success-content": "#011003",

                "warning": "#ffcb00",

                "warning-content": "#160f00",

                "error": "#ffa0b1",

                "error-content": "#16090c",
            },
        }],
    },
    plugins: [
		forms,
		require("daisyui")
	],
};
