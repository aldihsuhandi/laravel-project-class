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
      fgBlack: '#3b425',
      bgButton: '#d8dee9',
      bgHover: '#e5e9f0',
      blue: '#5E81AC',
      inputBg: '#434c5e',
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
