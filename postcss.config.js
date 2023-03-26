const purgecss = require('@fullhuman/postcss-purgecss')
const WordpressPurgeSafelist = require("purgecss-with-wordpress");

module.exports = {
  // Add you postcss configuration here
  // Learn more about it at https://github.com/webpack-contrib/postcss-loader#config-files
  plugins: [
    "autoprefixer",
    "postcss-pxtorem",
    purgecss({
      content: [
        'theme/**/*.{twig,php,js}',
        'theme/views/*.{twig,php,js}',
        'theme/views/blocks/**/*.{twig,php,js}',
      ],
      safelist: WordpressPurgeSafelist
    })
  ]
};
