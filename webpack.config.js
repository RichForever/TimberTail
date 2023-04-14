// Generated using webpack-cli https://github.com/webpack/webpack-cli

const path = require("path");
const glob = require("glob");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const RemoveEmptyScriptsPlugin = require('webpack-remove-empty-scripts');
const ImageMinimizerPlugin = require("image-minimizer-webpack-plugin");
const WebpackAssetsManifest = require("webpack-assets-manifest");
const TerserPlugin = require('terser-webpack-plugin');
const ProgressPlugin = require('progress-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");


const isProduction = process.env.NODE_ENV == "production";

const config = {
  src: {
    main: './theme/src/',
    scripts: './theme/src/js/',
    styles: './theme/src/scss/',
    images: './theme/src/images',
    fonts: './theme/src/fonts',
  },
  dist: {
    main: './theme/dist/',
    images: '',
    fonts: '',
  }
}

module.exports = {
  mode: isProduction ? "production" : "development",
  entry: {
    "scripts": config.src.scripts + "app.js",
    "blocks": config.src.scripts + "blocks.js",
    "twig": config.src.scripts + "twig.js",
    "styles": config.src.styles + "app.scss",
    "theme": config.src.styles + "theme.scss",
    "editor": config.src.styles + "editor-styles.scss",
  },
  output: {
    path: path.resolve(__dirname, config.dist.main),
    filename: isProduction ? "[name].[chunkhash:8].js" : "[name].js",
    chunkFilename: isProduction ? "[name].[chunkhash:8].js" : "[name].js",
    clean: true,
  },
  devtool: isProduction ? 'source-map' : 'eval-cheap-module-source-map',
  plugins: [
    new ProgressPlugin(),
    new RemoveEmptyScriptsPlugin(),
    new WebpackAssetsManifest({
      output: path.resolve(__dirname, config.dist.main + "manifest.json"),
      customize(entry, original, manifest, asset) {
        const pattern = /\.(js|css)$/i;
        if (!pattern.test(entry.key)) {
          return false;
        }
      },
    }),
    new MiniCssExtractPlugin({
      filename: isProduction ? "[name].[chunkhash:8].css" : "[name].css",
      chunkFilename: isProduction ? "[name].[chunkhash:8].css" : "[name].css",
    }),
    new BrowserSyncPlugin({
      host: 'localhost',
      port: 3000,
      proxy: 'http://dev.site',
      files: [
          "./theme/**/*.twig",
          "./theme/**/*.php",
          "./theme/**/*.scss",
          "./theme/**/*.css",
          "./theme/**/*.js"
      ]
    })
  ],
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/i,
        loader: "babel-loader",
      },
      {
        test: /\.s[ac]ss$/i,
        use: [
          MiniCssExtractPlugin.loader,
          "css-loader",
          "postcss-loader",
          {
            loader: "sass-loader",
            options: {
              sourceMap: true
            }
          }
        ],
      },
      {
        test: /\.css$/i,
        use: [MiniCssExtractPlugin.loader, "css-loader", "postcss-loader"],
      },
      {
        test: /\.(jpe?g|png|gif|svg)$/i,
        type: "asset/resource",
        generator: {
          filename: "images/[name][ext]",
        },
      },
      {
        test: /\.(woff|woff2|eot|ttf|otf)$/i,
        type: "asset/resource",
        generator: {
          filename: "fonts/[name][ext]",
        },
      },
      // Add your rules for custom modules here
      // Learn more about loaders from https://webpack.js.org/loaders/
    ],
  },
  resolve: {
    alias: {
      images: path.join(__dirname, config.src.images),
      fonts: path.join(__dirname, config.src.fonts),
    },
  },
  optimization: {
    splitChunks: {
      cacheGroups: {
        vendor: {
          test: /[\\/]node_modules[\\/]/,
          name: "vendors",
          chunks: "all",
        },
      },
    },
    minimizer: [
      "...",
      new CssMinimizerPlugin(),
      new ImageMinimizerPlugin({
        severityError: "warning",
        minimizer: {
          implementation: ImageMinimizerPlugin.imageminMinify,
          options: {
            plugins: [
              "imagemin-gifsicle",
              "imagemin-mozjpeg",
              "imagemin-pngquant",
              "imagemin-svgo",
            ],
          },
        },
      }),
      new TerserPlugin({
        extractComments: false,
        terserOptions: {
          format: {
            comments: false,
          },
        },
      }),
    ],
  },
};