const purgecss = require('@fullhuman/postcss-purgecss')
const purgecssWordpress = require('purgecss-with-wordpress')

module.exports = {
  plugins: [
    "autoprefixer",
    "postcss-pxtorem",
      purgecss({
        content: ['./theme/**/*.twig'],
        safelist: purgecssWordpress.safelist
      })
  ]
};
