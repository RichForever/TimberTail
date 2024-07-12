const purgecss = require("@fullhuman/postcss-purgecss");
const purgecssWordpress = require("purgecss-with-wordpress");

module.exports = {
  plugins: [
    require("tailwindcss"),
    require("autoprefixer"),
    require("postcss-pxtorem"),
  ],
};
