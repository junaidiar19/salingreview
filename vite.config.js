import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/css/admin.css",
                "resources/js/plugins/notyf.js",
                "resources/js/plugins/sweetalert2.js",

                // home page scss
                "resources/scss/home/style.scss",
                "resources/js/home/script.js",
            ],
            refresh: true,
        }),
    ],
});
