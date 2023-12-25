/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/**/*.{html,php}", "./public/**/*.js"],
  plugins: [],
  theme: {
    fontFamily: {
      display: ['Inter', 'system-ui', 'sans-serif'],
      body: ['Poppins', 'system-ui', 'sans-serif'],
    },
    fontSize: {
      md: '15px',
      sm: '0.8rem',
      xs: '0.6rem',
      base: '0.9rem',
      xl: '1.25rem',
      '2xl': '1.563rem',
      '3xl': '1.953rem',
      '4xl': '2.441rem',
      '5xl': '3.052rem',
    }
  },
  safelist: [
    'alert-info',
    'alert-warning',
    'alert-success',
    'alert-danger' 
  ],
}