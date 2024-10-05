import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                lora: ["Lora", "serif"],
                montserrat: ["Montserrat", "sans-serif"],
                "open-sans": ["Open-Sans", "sans-serif"],
            },

            colors: {
                navy: "#001F3F",
                "dark-navy": "#001A33",
                brightOrange: "#FFA500",
            },
        },
    },
    plugins: [forms, require("tw-elements/plugin.cjs")],
};
