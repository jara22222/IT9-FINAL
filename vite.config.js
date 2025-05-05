import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/scss/app.scss", // Change from CSS to SCSS
                "resources/js/app.js",
            ],
            refresh: true,
        }),
    ],
});
