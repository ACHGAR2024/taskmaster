import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Oswald", ...defaultTheme.fontFamily.sans],
                display: ["Figtree Display", "sans-serif"],
                logo: ["Suez One", "bold", "sans-serif"],
                h1: ["Suez One", "bold", "sans-serif"],
                h3: ["Figtree", "sans-serif"],
                nav: ["Figtree", "sans-serif"],
                p: ["Figtree", "sans-serif"],
            },
        },

        colors: {
            // Vos couleurs personnalisées ici
            // #0E9471 Vert P
            // #138EC6 bleu P
            // #313C58 Gris P
            // #EEEDF2 Arrière plan P

            vertp: "#0E9471",
            bleup: "#138EC6",
            grisp: "#313C58",
            arpp: "#eeedf2",
            blancp: "#FFFFFF",
        },
    },

    plugins: [forms],
};
