/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "**/*.{php,html,js}",
    "!./node_modules/**/*",
    "!./vendor/composer/**/*",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
