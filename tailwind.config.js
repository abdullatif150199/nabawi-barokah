/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/**/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        emerald: '#2E7D5D',
        'emerald-light': '#58A98A',
        'emerald-dark': '#1B5942',
        gold: '#E6C27A',
        'gold-dark': '#D0AC62'
      },
      fontFamily: {
        'poppins': ['Poppins', 'sans-serif']
      }
    },
  },
  plugins: [],
}
