/** @type {import('tailwindcss').Config} */

import preset from "./vendor/filament/support/tailwind.config.preset";
import colors from "tailwindcss/colors";

module.exports = {
    presets: [preset],
    content: [
        "./app/Filament/**/*.php",
        "./resources/views/filament/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
    ],
    theme: {
        extend: {
            extends: {
                colors: {
                    danger: colors.red,
                    primary: colors.cyan,
                    success: colors.green,
                    info: colors.amber,
                    warning: colors.yellow,
                },
            },
        },
    },
    plugins: [],
};
