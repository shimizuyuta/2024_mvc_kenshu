import typography from '@tailwindcss/typography';
import forms from '@tailwindcss/forms';
import aspectRatio from '@tailwindcss/aspect-ratio';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      height: {
        '25': '25vh',
        '50': '50vh',
        '75': '75vh',
        '85': '85vh',
        '100': '100vh',
      }
    },
  },
  plugins: [
    typography,
    forms,
    aspectRatio,
  ],
}
