import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
const path = require("path");

export default defineConfig({
    lib: {
        entry: path.resolve(__dirname, "lib/main.js"),
        name: "MyLib",
        fileName: (format) => `my-lib.${format}.js`,
    },
    plugins: [
        laravel({
            input: ["resources/sass/app.scss", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
