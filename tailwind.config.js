/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        pink: {
          50: '#fdf2f8',
          100: '#fce7f3',
          200: '#fbcfe8',
          300: '#f9a8d4',
          400: '#f472b6',
          500: '#ec4899',
          600: '#db2777',
          700: '#be185d',
          800: '#9d174d',
          900: '#831843',
        },
        // Brand colors for SILBELE
        brand: {
          blue: '#1e40af', // blue-800
          orange: '#f97316', // orange-500
          'blue-light': '#60a5fa', // blue-400
          'cart-orange': '#E99459', // Custom cart button color
        },
        // Custom cart orange color
        cart: {
          orange: '#E99459',
        },
      },
    },
  },
  plugins: [],
} 