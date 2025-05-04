/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./vendor/filament/**/*.blade.php"
    ],
    theme: {
      extend: {
        colors: {
          primary: '#A78BFA',
          secondary: '#FCD34D',
          success: '#6EE7B7',
        },
      },
    },
    plugins: [],
  }
  