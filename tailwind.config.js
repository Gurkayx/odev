// tailwind.config.js
module.exports = {
  darkMode: "class", // veya 'media'
  content: [
    "./*.html",
    "./*.php",
    "./pages/*.php",
    "./js/*.js",
    "./pages/*.html",
    "./components/*.php",
    "./components/*.html",
    "./src/**/*.{html,php,js}",
    'node_modules/preline/dist/*.js',
  ],
  theme: {
    extend: {
      backgroundImage: {
        'hero-pattern': "url('/assets/background.webp')",
      }
    },
  },
  plugins: [
      require('preline/plugin'),
  ],
}
