import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/admin.js",
                "resources/js/jquery.js",
                "resources/js/owl.carousel.js",
            ],
            refresh: true,
        }),
    ],
});
