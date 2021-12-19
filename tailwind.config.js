module.exports = {
  purge: [
     './resources/**/*.blade.php',
     './resources/**/*.js',
     './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
    colors: {
      bg: '#2e3440',
      bgAlt: '#4c566a',
      fg: '#ffffff',
      fgAlt: '#eceff4',
      fgBlack: '#3b425a',
      bgButton: '#d8dee9',
      bgHover: '#e5e9f0',
      blue: '#5E81AC',
      blueAlt: '#8be9fd',
      inputBg: '#434c5e',
      green: '#059669',
      red: '#BF616A',
      grey: '#d9d9d9',
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
