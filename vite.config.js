import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/admin.css",
                "resources/css/app.css",
                "resources/css/owl.css",
                "resources/js/admin.js",
                "resources/js/app.js",
                "resources/js/owl.js",
                "resources/js/quill.js",
            ],
            refresh: true,
        }),
    ],
});
