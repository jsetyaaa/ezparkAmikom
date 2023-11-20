/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.{html,js,php}",
    "./**/*.{html,js,php}",
    "./**/**/*.{html,js,php}"
  ],
  theme: {
    extend: {
      colors: {
        'main-color' : '#D0BFFF',
        'font-color' : '#35155D',
        'button-color' : '#5C4B99'
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms')({
      strategy: 'base', // only generate global styles
      strategy: 'class', // only generate classes
    })
    
  ],
}

