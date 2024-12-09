/** @type {import('tailwindcss').Config} */
import typography from '@tailwindcss/typography';
import forms from '@tailwindcss/forms';
import containerQueries from '@tailwindcss/container-queries';

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
    theme: {
        extend: {
            spacing: {
                'wide': '100rem',
                'wider': '150rem',
            },
            lineHeight: {
                'looser': '2',
                'floppy': '2.4',
            }
        },
    },
  plugins: [
        typography,
        forms,
        containerQueries,
    ],
}

