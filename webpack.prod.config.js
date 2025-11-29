// webpack.prod.config.js
const path = require("path");
const fs = require("fs");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const TerserPlugin = require("terser-webpack-plugin");

// Helper: get all files in a folder with extension
function getEntries(dir, ext, prefix) {
  const entries = {};
  fs.readdirSync(dir)
    .filter(file => file.endsWith(ext) && !file.endsWith(`.min${ext}`))
    .forEach(file => {
      const name = path.basename(file, ext);
      entries[`${prefix}/${name}`] = path.resolve(dir, file);
    });
  return entries;
}

const jsEntries = getEntries(path.resolve(__dirname, "website/js"), ".js", "js");
const cssEntries = getEntries(path.resolve(__dirname, "website/css"), ".css", "css");

module.exports = {
  mode: "production",

  entry: {
    ...jsEntries,
    ...cssEntries,
  },

output: {
  path: path.resolve(__dirname, "website"),
  filename: (pathData) => {
    const chunkName = pathData.chunk && pathData.chunk.name ? pathData.chunk.name : "";
    return chunkName.startsWith("js/")
      ? "[name].min.js"
      : "[name].js";
  },
  clean: false,
},


  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
          },
        },
      },
      {
        test: /\.css$/,
        type: "javascript/auto",
        use: [
          MiniCssExtractPlugin.loader,
          { loader: "css-loader", options: { url: false } },
        ],
      },
    ],
  },

  plugins: [
    new MiniCssExtractPlugin({ filename: "[name].min.css" }),
  ],

  optimization: {
    minimize: true,
    minimizer: [
      new TerserPlugin({
        parallel: true,
        terserOptions: {
          compress: true,
          mangle: true,
          format: { comments: false },
        },
      }),
      new CssMinimizerPlugin(),
    ],

    // 🧠 Extract shared dependencies into vendors.js
    splitChunks: {
      chunks: "all",
      cacheGroups: {
        vendor: {
          test: /[\\/]node_modules[\\/]/,
          name: "vendors",
          chunks: "all",
          enforce: true,
        },
      },
    },
  },

  // 🚫 Disable size warnings if desired
  performance: {
    hints: false,
  },

  stats: { errorDetails: true },
};
