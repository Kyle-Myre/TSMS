import colors from 'tailwindcss/colors' 
import forms from '@tailwindcss/forms'
import typography from '@tailwindcss/typography' 
 
export default {
    content: [
        './resources/**/*.blade.php',
        './vendor/filament/**/*.blade.php', 
        'resources/css/filament.css',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: { 
                danger: colors.rose,
                primary: colors.green,
                success: colors.cyan,
                warning: colors.orange,
            }, 
        },
    },
    plugins: [
        forms, 
        typography, 
    ],
}