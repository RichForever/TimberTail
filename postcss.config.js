const purgecss = require('@fullhuman/postcss-purgecss')
const purgecssWordpress = require('purgecss-with-wordpress')

module.exports = {
  plugins: [
    require('tailwindcss'),
    require('autoprefixer'),
    require('postcss-pxtorem'),
    // purgecss({
    //   content: [
    //       './theme/**/*.twig',
    //       './theme/views/**/*.twig'
    //   ],
    //   safelist: purgecssWordpress.safelist,
    // })
  ]
}