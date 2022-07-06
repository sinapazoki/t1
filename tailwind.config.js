const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
          content: [
            "./resources/**/*.blade.php",
            "./resources/**/*.js",
            "./resources/**/*.vue",
          ],
    theme: {
      extend: {
        keyframes: {
          bounce_down: {
            '0%, 100%': { transform: 'translateY(-25%)' },
            '50%': { transform: 'translateY(0)' },
          },
          bounce_up: {
            '0%, 100%': { transform: 'translateY(25%)' },
            '50%': { transform: 'translateY(0)' },
          }
        },
        animation: {
          'bounce-up': 'bounce_up 4s linear infinite',
          'bounce-down': 'bounce_down 6s linear infinite',
        },
      colors: {
        'primary': {
          100: '#dff6ff',
          200: '#b6e8fb',
          300: '#a4bce6',
          400: '#22d3ee',
          500: '#7d94bd',
          600: '#6889c3',
          700: '#232dbd',
          800: '#192089',
          900: '#10166a',
        }, 
     },
    },
    },

    plugins: [require("daisyui")],
  };
