import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import react from "@vitejs/plugin-react";
import path from "path";

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
                "resources/ts/app.tsx",
            ],
            refresh: true,
        }),
        react(),
    ],
    resolve: {
        alias: {
            "@/components": path.resolve(
                __dirname,
                "./resources/ts/components"
            ),
            "@/lib": path.resolve(__dirname, "./resources/ts/lib"),
        },
    },
});
