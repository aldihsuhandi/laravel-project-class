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
      bgButton: '#d8dee9',
      blue: '#5E81AC',
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
