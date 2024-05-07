/** @type {import('tailwindcss').Config} */
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
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/container-queries'),
    ],
}

