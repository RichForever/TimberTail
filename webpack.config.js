// Generated using webpack-cli https://github.com/webpack/webpack-cli

const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const FixStyleOnlyEntriesPlugin = require("webpack-fix-style-only-entries");
const ImageMinimizerPlugin = require("image-minimizer-webpack-plugin");
const WebpackAssetsManifest = require("webpack-assets-manifest");

const isProduction = process.env.NODE_ENV == "production";

module.exports = {
  mode: isProduction ? "production" : "development",
  entry: {
    "scripts": "./theme/src/scripts/app.js",
    "styles": ["./theme/src/styles/app.scss"],
    "editor": ["./theme/src/styles/editor-styles.scss"],
  },
  // entry: "./theme/src/scripts/app.js",
  output: {
    path: path.resolve(__dirname, "theme/public"),
    filename: isProduction ? "[name].[chunkhash:8].js" : "[name].js",
    chunkFilename: isProduction ? "[name].[chunkhash:8].js" : "[id].js",
    clean: true,
  },
  plugins: [
    new WebpackAssetsManifest({
      output: path.resolve(__dirname, "theme/public/manifest.json"),
      customize(entry, original, manifest, asset) {
        const pattern = /\.(js|css)$/i;
        if (!pattern.test(entry.key)) {
          return false;
        }
      },
    }),
    new FixStyleOnlyEntriesPlugin(),
    new MiniCssExtractPlugin({
      filename: isProduction ? "[name].[chunkhash:8].css" : "[name].css",
      chunkFilename: isProduction ? "[name].[chunkhash:8].css" : "[id].css",
    }),

    // Add your plugins here
    // Learn more about plugins from https://webpack.js.org/configuration/plugins/
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
          "sass-loader",
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
      images: path.join(__dirname, "theme/src/images"),
      fonts: path.join(__dirname, "theme/src/fonts"),
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
      new ImageMinimizerPlugin({
        severityError: "warning",
        minimizer: {
          //   filename: "[name][ext]",
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
    ],
  },
  devtool: "source-map",
};